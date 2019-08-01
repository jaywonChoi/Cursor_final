<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\User;
use App\Order;
use App\OrderProducts;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Input;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Cart::content());
      $like = Product::alsolike()->get();
        return view('/cart/cart')->with('like',$like);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Cart::add($request->pid,$request->ptitle,$qty=1,$request->price)->associate('App\Product');


        return redirect()->route('cart.index')->with('success_message','Product added!');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

          //dd(Cart::content());
          $qty = $request->newQty;
          $rowId=$request->rowID;
          //Update
          Cart::update($rowId,$qty);

        return redirect()->back()->with('success_message', 'Product qty changed');
        //  Cart::update($id,$request->qty);
        //  return redirect()->back()->with('success_message', 'Product qty changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cart::remove($id);
        return back()->with('success_message','Product has been removed!');
    }


    ///payment
    public function getcheckout()
    {
      if (Auth::check()) {

        return view('/cart/checkForm',compact('users'));
      }
      else {

        return redirect()->route('user.signin')->with('cartlogin');
      }

    }
    //save orders
    public function postcheckout(Request $request)
    {
      //dd($request->all());
      //$cartProducts = Cart::content()->map(function ($product){
      //  return $product->model->ptitle.','.$product->qty;
      //})->values()->toJson();

      try {
        $charge = Stripe::charges()->create([
          'amount'=> Cart::total(),
          'currency'=> 'JPY',
          'source' => $request->stripeToken,
          'description'=>'Order',
          'receipt_email' =>$request->email,
          'metadata'=>[
            //'content' => $contents,
            //'quantity'=> Cart::count(),
          ],
        ]);


        //save order database
        $order = new Order();
        $order->uid = Auth::user()->uid;
        $order->tax = Cart::tax();
        $order->subtotal = Cart::subtotal();
        $order->total = Cart::total();
        $order->fullname= Input::get('fullname');
        $order->email =Input::get('email');
        $order->zip =Input::get('zip01');
        $order->address_do = Input::get('pref01');
        $order->address_si = Input::get('addr01');
        $order->address_city = Input::get('city01');
        $order->phone =Input::get('phone');
        $order->card_name =Input::get('cname');
        $order->payment_id ='VISA';
        $order->save();
        // CART PRODUCT

        foreach (Cart::content() as $product) {
          OrderProducts::create([
            'order_id' => $order->id,
            'product_pid'=> $product->model->pid,
            'quan'=>$product->qty,
          ]);
        }

        //product quan --
        $this->decreaseQuantities();
        Cart::destroy();
        return redirect()->route('pay.orderthank')->with('success_message', 'Thank you for Order!');
      } catch (Exception $e) {
        return back()->with('error_message', 'check your card number or cvc number!');
      }

    }
    protected function decreaseQuantities()
    {
      foreach (Cart::content() as $item) {
        $product =Product::find($item->model->pid);
        $product->update(['quan'=>$product->quan -$item->qty ]);
      }
    }


    public function getchecked()
    {
      return view('/cart/orderthank');
    }

}
