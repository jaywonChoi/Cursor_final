@extends('layouts.adminheader')
@section('content')

    <h2>Product Update</h2>

    <a href="{{route('product.delete',$product->pid)}}"><input type="button" style="float:right" class="w3-button w3-deep-orange" value="Delete"></a>
    <a href="{{route('product.list')}}"><input type="button" style="float:right;margin-right:10px" class="w3-button w3-khaki" value="Back to list"></a>
<br><br>
      <div class="w3-col l3 s6" >
        <div class="w3-container">
          <form action="{{route('updating.product',$product->pid)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table>
              <tr>
                <td>Category</td>
                <td>{{$product->category}}</td>
              </tr>
              <tr>
                <td>Name</td>
                <td><input type="text" name="pname" id="pname" value="{{$product->pname}}"></td>
              </tr>
              <tr>
                <td>Title</td>
                <td><input type="text" name="ptitle" id="ptitle" value="{{$product->ptitle}}"></td>
              </tr>
              <tr>
                <td>Text</td>
                <td><textarea name="ptext" id="ptext" rows="8" cols="80">{{$product->ptext}}</textarea></td>
              </tr>
              <tr>
                <td>Price</td>
                <td><input type="text" name="price" id="price" value="{{$product->price}}">円</td>
              </tr>
              <tr>
                <td>Quantity</td>
                <td><input type="text" name="quan" id="quan" value="{{$product->quan}}">冊</td>
              </tr>
              <tr>
                <td>Main Image</td>
                <td><input type="file" name="main" id="main" ></td>
              </tr>
              <tr>
                <td>sub Image1</td>
                <td><input type="file" name="sub1" id="sub1" ></td>
              </tr>
              <tr>
                <td>sub Image2</td>
                <td><input type="file" name="sub2" id="sub2" ></td>
              </tr>

            </table>
            <input type="submit" id="save" value="save">
          </form>

        </div>
      </div>
@stop
