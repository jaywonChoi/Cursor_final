@extends('layouts.adminheader')
@section('content')

    <h2>Product Read</h2>

    <a href="{{route('product.delete',$product->pid)}}"><input type="button" style="float:right" class="w3-button w3-deep-orange" value="Delete"></a>
    <a href="{{route('product.list')}}"><input type="button" style="float:right;margin-right:10px" class="w3-button w3-khaki" value="Back to list"></a>
    <a href="{{route('product.update',$product->pid)}}"><input type="button" style="float:right;margin-right:10px" class="w3-button w3-green" value="Update"></a>

    <div class="w3-row" style="width:100%">
      <div class="w3-col l3 s6" style="width:100%" >
        <div class="w3-container">
          <table>

            <tr>
              <td><h2>NO.{{ $product->pid }}</h2></td>
            </tr>
            <tr>
              <td>Category</td>
              <td>{{$product->category}}</td>
            </tr>
            <tr>
              <td>Title</td>
              <td>{{$product->ptitle}}</td>
            </tr>
            <tr>
              <td>Code Number.</td>
              <td>{{$product->pname}}</td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td>{{$product->quan}}</td>
            </tr>
            <tr>
              <td>Text</td>
              <td>{{$product->ptext}}</td>
            </tr>
            <tr>
              <td>Price</td>
              <td>￥{{$product->price}}</td>
            </tr>

          </table>


          <div class="w3-row" style="background-color:#f2f2f2;border-radius:3px;margin:5%;">
            <h4>Images</h4>
            <div class="w3-col l3 s6" style="width:33%" >
              <div class="w3-container w3-display-container">
                <img src="{{asset('/uploads/'.$product->main)}}"style="width:100%" >
                <p><b>Main image</b></p>
              </div>
            </div>
              <div class="w3-col l3 s6" style="width:33%" >
              <div class="w3-container w3-display-container">
                <img src="{{asset('/uploads/'.$product->sub1)}}" style="width:100%" >
                <p><b>Sub1 image</b></p>
              </div>
            </div>
            <div class="w3-col l3 s6" style="width:33%" >
              <div class="w3-container w3-display-container">
              <img src="{{asset('/uploads/'.$product->sub2)}}" style="width:100%" >
                <p><b>Sub2 image</b></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

@stop
