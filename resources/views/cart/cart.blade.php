@extends('layouts.cartheader')
@section('content')

<script>
  $(document).ready(function(){

      @foreach(Cart::content() as $item)
      $("#upCart{{$item->rowId}}").on('change',function(){

        var newQty =$("#upCart{{$item->rowId}}").val();
        var rowID = $("#rowID{{$item->rowId}}").val();

        $.ajax({
          url:"{{url('/cart/update')}}",
          data:'rowID='+ rowID + '&newQty=' +newQty,
          type:'get',
          success:function(response){
            alert('quantity has been changed!');
            location.reload();
          },
          error:function(err){
            console.log(err);
          }
        });
      });
    @endforeach
  });

</script>

  <div class="col-25">
    @if(session()->has('success_message'))
    <div class="w3-panel w3-green w3-round">
      {{ session()->get('success_message')}}
    </div>
    @endif
    @if(Cart::count()> 0)
    <div class="w3-panel w3-grey w3-round">
    <p>{{ Cart::count() }} products in Cart!</p>
  </div>
    @endif

    @if(Cart::count()=== 0)
      <div class="w3-container w3-center">
        <p>No Product in Cart!</p>
        <a style="text-decoration: none" href="{{route('shoppage')}}"><button class="w3-button w3-black" >Continue shopping!</button></a>
      </div>
    @endif


    <div class="container">
        <div class="w3-container">
          <ul class="w3-ul w3-card-4">
            @foreach(Cart::content() as $item)
            <li class="w3-bar">

              <form  action="{{route('cart.destory',$item->rowId)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <button type="submit" class="w3-bar-item w3-button w3-white w3-right w3-xlarge">x</button>
              </form>

              <a href="{{route('detail',$item->model->pid)}}"><img src="{{asset('/uploads/'.$item->model->main)}}" class="w3-bar-item w3-square" style="width:15%"></a>
              <div class="w3-bar-item" style="width:20%">
                <span class="w3-large"><a href="{{route('detail',$item->model->pid)}}">{{$item->model->ptitle}}</a></span>
              </div>
              <div class="w3-bar-item" style="width:20%">
                <div>
                <input type="text" class="qty-fill" id="upCart{{$item->rowId}}"  value="{{ $item->qty }}" min="1" max="100" style="width:50px;text-align:center;">
                <input type="hidden" id="rowID{{$item->rowId}}" value="{{$item->rowId}}">
                <!--button make !!-->
              </div>


              </div>
              <div class="w3-bar-item">

                <span class="w3-large" id="price_span">￥{{ Cart::get($item->rowId)->subtotal()}}</span>

              </div>
            </li>
              @endforeach
          </ul>
        </div>

        <div class="w3-container" style="background-color:#f2f2f2;border-radius:3px;margin:5%;text-align:right">
          <p>Quantity: {{ Cart::count() }}冊</p>
          <p>SubTotal: ￥{{ Cart::subtotal()}}</p>
          <p>Tax(8%):  ￥{{ Cart::tax()}}</p>
          <p>Total:    ￥{{ Cart::total() }}</p>

          <div style="text-align:right; margin-bottom:5px">
            @if(Cart::count()> 0)

            <a href="{{route('shoppage')}}"><button class="w3-button w3-black">商品ページへ</button></a>
            <a href="{{route('pay.checkoutform')}}"><button class="w3-button w3-black">注文</button></a>

            @endif

          </div>
        </div>

    </div>


<!--random product-->

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
