<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class ProductController extends Controller
{

  //product page open
    public function index()
    {
      //product list_show
      $products = Product::orderBy('created_at','desc');
      $products = Product::all();
      return view('list',compact('products'));
    }

    //upload page open, upload files
    public function create()
    {
      // code...
      return view('upload');
    }

    //@param request
    //@return respose
    public function store(Request $request)
    {

      //create new Product
      $product = new Product();

      $product->pname = Input::get('pname');
      $product->ptitle = Input::get('ptitle');
      $product->ptext =Input::get('ptext');
      $product->price = Input::get('price');
      $product->quan = Input::get('quan');
      $product->category = Input::get('category');

      //images -> main , sub1 , sub2
      if ($request->hasFile('main')) {

        //main sub1 sub2
        $main = Input::file('main');

        //name save
        $main_name= $main->getClientOriginalName();

        //public uploads -> folder
        $main->move('uploads',$main_name);

        $product->main = $main_name;


      }
      if (Input::hasFile('sub1')) {
        //main sub1 sub2
        $sub1 = Input::file('sub1');

        //name save
        $sub1_name= $sub1->getClientOriginalName();

        //public uploads -> folder
        $sub1->move('uploads',$sub1_name);

        $product->sub1 = $sub1_name;

      }
      if (Input::hasFile('sub2')) {
        //main sub1 sub2
        $sub2 = Input::file('sub2');

        //name save
        $sub2_name= $sub2->getClientOriginalName();

        //public uploads -> folder
        $sub2->move('uploads',$sub2_name);

        $product->sub2 = $sub2_name;

      }

      //save
      //$product->fill($request->all());
      $product->save();

      return redirect()->route('product.list');
    }

    //show
    public function show($pid)
    {
      // code...
      $product = Product::findOrFail($pid);

      return view('show',compact('product'));
    }
    public function edit($pid)
    {
      // show update form
      $product = Product::find($pid);
      return view('update',compact('product'));
    }
    public function update($pid)
    {
      // db update
      $product = Product::findOrFail($pid);

      $product->pname = Input::get('pname');
      $product->ptitle = Input::get('ptitle');
      $product->ptext =Input::get('ptext');
      $product->price = Input::get('price');
      $product->quan = Input::get('quan');
      $product->category = Input::get('category');

      //images -> main , sub1 , sub2
      if (Input::hasFile('main')) {

        //main sub1 sub2
        $main = Input::file('main');

        //name save
        $main_name= $main->getClientOriginalName();

        //public uploads -> folder
        $main->move('uploads',$main_name);
        $old_main = $product->main;

        $product->main = $main_name;
        Storage::delete($old_main);

      }
      if (Input::hasFile('sub1')) {
        //main sub1 sub2
        $sub1 = Input::file('sub1');

        //name save
        $sub1_name= $sub1->getClientOriginalName();

        //public uploads -> folder
        $sub1->move('uploads',$sub1_name);
        $old_sub1 = $product->sub1;
        $product->sub1 = $sub1_name;
        Storage::delete($old_sub1);

      }
      if (Input::hasFile('sub2')) {
        //main sub1 sub2
        $sub2 = Input::file('sub2');

        //name save
        $sub2_name= $sub2->getClientOriginalName();

        //public uploads -> folder
        $sub2->move('uploads',$sub2_name);
        $old_sub2 = $product->sub2;

        $product->sub2 = $sub2_name;
        Storage::delete($old_sub2);

      }

      $product->save();

      return redirect()->route('product.list');

    }

    public function destory($pid)
    {
      // delete product
      Product::destroy($pid);

      return redirect()->route('product.list');
    }


}
