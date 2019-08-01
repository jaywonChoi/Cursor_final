@extends('layouts.header')
@section('content')
  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <img src="{{asset('/images/nylon-jaypark.jpg')}}" alt="" style="width:100%;margin-bottom:25px">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <!--<h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>-->
      <h1 class="w3-hide-small">2019.07</h1>
      <p><a href="#shop" class="w3-button w3-black w3-padding-large w3-large">Check NOW</a></p>
    </div>
  </div>


  <!-- Product grid
 auto pattern
-->
<div class="w3-container w3-text-grey">
   <p>New arrivals</p>
 </div>
 <div class="w3-row" id="shop">
   @foreach($products as $product)
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
<div style="text-align: center;margin-bottom:25px;">
  <a href="{{route('shoppage')}}" class="w3-button w3-black w3-padding-large w3-large">View more</a>
</div>

@stop
