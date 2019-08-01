@extends('layouts.adminheader')
@section('content')

<div class="w3-container">
  <h2>Product CRUD</h2>
  <a href="{{route('upload')}}"><input type="button" style="float:right" class="w3-button w3-yellow" value="Create"></a>

  <ul >
    @foreach($products as $product)
  <li class="w3-bar">
    <img src="{{asset('/uploads/'.$product->main)}}"  class="w3-bar-item w3-square w3-hide-small" style="width:85px">
    <div class="w3-bar-item">
      <span>NO.{{ $product->pid }}</span><br>
      <span>Category : {{ $product->category}}</span><br>
      <span class="w3-large"><a href="{{route('product.show',$product->pid)}}">{{$product->ptitle}}</a></span><br>

    </div>
  </li>
    @endforeach
</ul>
</div>





@stop
