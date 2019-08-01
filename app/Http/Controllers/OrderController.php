<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProducts;
use App\Product;

class OrderController extends Controller
{
    //adminPage
    public function index()
    {
      // code...
      $orders = Order::orderBy('created_at','desc');
      $orders = Order::all();
      return view('admin-orders/orders',compact('orders'));
    }
    public function show($id)
    {
      $order = Order::findOrFail($id);
      $products = OrderProducts::all()->where($id);
      $products= $order->products;
      //dd($order,$products);

      return view('admin-orders/detailorders')->with([
        'order'=>$order,
        'products'=>$products
      ]);
    }
    public function qty()
    {
      //Product_Quan
      $products = Product::all();
      $products_id = Product::all('pid');
      //dd($products_id );

      $orders= OrderProducts::all();
      $product_pid =OrderProducts::all('product_pid');
      //dd($orders_id);
      
      return view('/adminqty')->with([
        'products'=>$products,
        'orders'=>$orders
      ]);

    }

}
