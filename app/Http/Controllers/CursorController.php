<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;


class CursorController extends Controller
{
    //
    public function index()
    {
      //
      $products = Product::orderBy('updated_at','desc');
      $products = Product::all()->take(4);
      return view('Cursor',compact('products'));
    }

    public function show($pid)
    {
      //detail product show
      $product = Product::findOrFail($pid);
      $like = Product::where('pid','!=',$pid)->alsolike()->get();

      //dd($product);
      return view('detail',compact('product'))->with('like',$like);
    }

    //shoppage
    public function shop()
    {
      // code...
      //
      $products = Product::orderBy('created_at','desc');
      $products = Product::all();
      return view('shop',compact('products'));
    }




}
