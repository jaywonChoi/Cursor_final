@extends('layouts.header')
@section('content')

<div class="w3-container w3-text-grey">
   <p>Products</p>
 </div>
 <div class="w3-row" id="shop">
   @foreach($mensnonnos as $product)
   <div class="w3-col l3 s6" >

     <div class="w3-container w3-display-container">
       <img src="{{asset('/uploads/'.$product->main)}}" style="width:197px;height:252px">
       <span class="w3-tag w3-display-topleft">New</span>
       <div class="w3-display-middle w3-display-hover">
         <a href="{{route('detail',$product->pid)}}">
         <button class="w3-button w3-black">Detail<i class="fa fa-shopping-cart"></i></button>
        </a>
       </div>
       <p>{{$product->ptitle}}<br><b>￥{{$product->price}}</b></p>
     </div>
   </div>
   @endforeach
 </div>


@stop
