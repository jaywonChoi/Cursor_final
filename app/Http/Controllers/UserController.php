<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use App\Order;
use App\OrderProducts;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    //login form open
    public function getsignin()
    {
      return view('user.signin');
    }
    //login form id pw checkS
    public function postsignin(Request $request)
    {
      // code...

      if (Auth::attempt(['uid'=>$request->input('uid'),'password'=>$request->input('password')])) {
        return redirect()->route('Cursor');
      }

      if (!Auth::attempt(['uid'=>$request->input('uid'),'password'=>$request->input('password')])) {

        return redirect()->route('user.signin')->with('error_messages', 'ID、またパスワードが違います。');
      }

    }

    //sign up open
    public function getsignup()
    {
      return view('user.signup');
    }
    //sign up check
    public function postsignup(Request $request)
    {
      //bcrypt password auth
      if (User::where('uid',Input::get('uid'))->exists()) {
        return redirect()->route('user.signup')->with('error_messages', 'このIDは利用できません。');
      }
      $user= new User([
        'uid'=>$request->input('uid'),
        'email'=> $request->input('email'),
        'password'=>bcrypt($request->input('password')),
        'fullname'=>$request->input('fullname'),
        'phone'=>$request->input('phone'),
        'sex'=>$request->input('sex')
      ]);


      $user->save();
      Auth::login($user);

      return redirect()->route('Cursor');
    }
    //logout
    public function logout(Request $request)
    {
      // session out
      $request->session()->flush();
      Auth::logout();
      return redirect('/cursor');
    }
    public function getprofile(Order $order)
    {
      /*
      if (auth()->id()!== $order->uid) {
        return back()->with('error_messages','Wrong Access!');
      }
      */
      //model orders get!
      $uid = Auth::user()->uid;
      $orders= Order::all()->where('uid', $uid);


      return view('user.uprofile')->with('orders',$orders);
    }
    public function getprofileProduct($id)
    {
      $order = Order::findOrFail($id);
      $products = OrderProducts::all()->where($id);
      $products= $order->products;
      return view('user.udetail')->with([
        'order'=>$order,
        'products'=>$products
      ]);
    }
    public function getprofileupdate()
    {
      return view('user.profileupdate');
    }
    public function update(Request $request)
    {

      $user = auth()->user();
      $user->update([
        'email'=> $request->input('email'),
        'password'=>bcrypt($request->input('password')),
        'phone'=>$request->input('phone')
      ]);

      $user->save();


      return redirect()->route('user.uprofile')->with('success_message','Profile updated!');
    }
}
