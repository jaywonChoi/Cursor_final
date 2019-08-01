@extends('layouts.adminheader')
@section('content')
    <h2>Product Create</h2>
    <!--<p>Welcome {{ Session::get('adminid') }}様</p>-->
    <a href="{{route('product.list')}}"><input type="button" style="float:right;margin-right:10px" class="w3-button w3-khaki" value="Back to list"></a>
    <form action="{{ route('image.upload.product')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table style="width:50%">
        <tr>
          <td>Category</td>
          <td>
            <select name="category" id="category">
              <option value="nonno">nonno</option>
              <option value="men_nonno">Men's nonno</option>
              <option value="anan">anan</option>
              <option value="seventeen">Seventeen</option>
              <option value="jelly">Jelly</option>
              <option value="leane">リンネル</option>
              <option value="nylon">NYLON</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Code Number.</td>
          <td><input type="text" name="pname" id="pname" placeholder="名前を入力してください。"></td>
        </tr>
        <tr>
          <td>Title</td>
          <td><input type="text" name="ptitle" id="ptitle" placeholder="タイトルを入力してください。"></td>
        </tr>
        <tr>
          <td>Text</td>
          <td><textarea name="ptext" id="ptext" placeholder="商品の説明文を入力してください。" rows="8" cols="80"></textarea></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input type="text" name="price" id="price" placeholder="税込み価額を入力してください。">円</td>
        </tr>
        <tr>
          <td>Quantity</td>
          <td><input type="text" name="quan" id="quan" placeholder="在庫を入力してください。">冊</td>
        </tr>

      </table>

      Main Image <input type="file" name="main" id="main" ><br><br>
      sub Image1 <input type="file" name="sub1" id="sub1" ><br><br>
      sub Image2 <input type="file" name="sub2" id="sub2" ><br><br>

      <input type="submit" id="save" value="save">
    </form>


@stop
