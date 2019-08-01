@extends('layouts.shop')
@section('content')
  <!--product images
  product details and images
  get cart buttons
-->

<div class="w3-row w3-container">
  <div class="w3-col s6">
    <div class="w3-display-container mySlides">
    <img src="{{asset('/uploads/'.$product->main)}}" style="width:69%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Main Image</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="{{asset('/uploads/'.$product->sub1)}}" style="width:69%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Sub1</p>
      </div>
    </div>
    <div class="w3-display-container mySlides">
    <img src="{{asset('/uploads/'.$product->sub2)}}" style="width:69%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Sub2</p>
      </div>
    </div>
    <div class="w3-col">
      <div class="w3-section">
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="{{asset('/uploads/'.$product->main)}}" style="width:80%;cursor:pointer" onclick="currentDiv(1)" title="Main">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="{{asset('/uploads/'.$product->sub1)}}" style="width:80%;cursor:pointer" onclick="currentDiv(2)" title="Sub1">
        </div>
        <div class="w3-col s3">
          <img class="demo w3-opacity w3-hover-opacity-off" src="{{asset('/uploads/'.$product->sub2)}}" style="width:80%;cursor:pointer" onclick="currentDiv(3)" title="Sub2">
        </div>
      </div>
    </div>
  </div>

  <div class="w3-col s6 ">
    <div class="w3-text-grey">
      <span>Category > {{$product->category}}</span>
      <h2>{{ $product->ptitle}}</h2>
      <h2 class="w3-text" style="color:lightsalmon">￥{{$product->price}} (税抜)</h2>
      <h4>在庫: {{ $product->quan}}</h4>

    </div>
    @if($product->quan == 0)
    <div>

      <p>在庫がありません。</p>
    </div>
    @endif
    @if($product->quan > 0)
    <div id="kart">

      <form action="{{ route('cart.store')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="pid" value="{{ $product->pid }}">
        <input type="hidden" name="ptitle" value="{{ $product->ptitle }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        <button type="submit" name="button" class="w3-button w3-teal"style="width:50%">カートへ</button>
      </form>
    </div>
    @endif
    <div class="container" style="float:left">
      <table class="w3-table w3-bordered" >
        <p>お客様の声</p>
        <tr>
          <th>注文日時</th>
          <th>ID</th>
          <th>コメント</th>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>

</div>
<div class="w3-container">
  <h3>内容詳細</h3>
  <p>{{ $product->ptext}}</p>
  <p>言語: 日本語</p>
  <p>梱包サイズ: 29.4 x 23 x 1 cm </p>
</div>
<!-- detail -->


<!--also like-->
<div class="w3-row" style="background-color:#f2f2f2;border-radius:3px;margin:5%">
  <h4 style="margin:20px">Don't miss our other product!</h4>
  @foreach($like as $product)
  <div class="w3-col l3 s6" >
    <div class="w3-container w3-display-container">
      <a href="{{route('detail',$product->pid)}}" style="text-decoration:none;">
        <img src="{{asset('/uploads/'.$product->main)}}" style="width:167px;height:222px;">
        <p>{{$product->ptitle}}<br><b>￥{{$product->price}}</b></p>
      </a>
    </div>
  </div>
  @endforeach
</div>




@stop
