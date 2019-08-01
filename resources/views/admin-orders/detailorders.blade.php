@extends('layouts.adminheader')
@section('content')

<div class="w3-container">
  <h2>Detail Orders</h2>
  <div class="container" style="float:left;margin-right:20px">
    <table class="w3-table w3-bordered" >
      <p>注文情報</p>
      <tr>
        <th>注文日時</th>
        <td>{{$order->created_at}}</td>
      </tr>
      <tr>
        <th>注文番号</th>
        <td>{{$order->id}}</td>
      </tr>
      <tr>
        <th>決済</th>
        <td>{{$order->payment_id}} card</td>
      </tr>
      <tr>
        <th>カードの持ち主</th>
        <td>{{$order->card_name}} 様</td>
      </tr>
    </table>

  </div>
  <div class="container" style="float:inline-start">
    <table class="w3-table w3-bordered">
      <p>注文者情報</p>
      <tr>
        <th>注文者</th>
        <td>{{$order->fullname}} 様</td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>{{$order->zip}}</td>
      </tr>
      <tr>
        <th>都道府県市区町村</th>
        <td>{{$order->address_do}}{{$order->address_si}}</td>
      </tr>
      <tr>
        <th>その他住所</th>
        <td>{{$order->address_city}}</td>
      </tr>
      <tr>
        <th>お電話番号</th>
        <td>{{$order->phone}}</td>
      </tr>
      <tr>
        <th>メール</th>
        <td>{{$order->email}}</td>
      </tr>
    </table>
  </div>
</div>

<div class="container" >
  <table class="w3-table w3-bordered" style="float:middle">

    <p>注文内容</p>
    <tr>
      <th>商品番号</th>
      <th>商品</th>
      <th>価格</th>
      <th>数量</th>


    </tr>
    @foreach($order->products as $p)
    <tr>
      <td>{{$p->pname}}</td>
      <td>{{$p->ptitle}}</td>
      <td>￥{{$p->price}}</td>
      <td>{{$p->pivot->quan}}冊</td>

    </tr>
    @endforeach
    <tr>
      <th>小計</th>
      <td></td>
      <td></td>
      <td>￥{{$order->subtotal}}</td>
    </tr>
    <tr>
      <th>Tax(8%)</th>
      <td></td>
      <td></td>
      <td>￥{{$order->tax}}</td>
    </tr>
    <tr>
      <th>合計金額</th>
      <td></td>
      <td></td>
      <td>￥{{$order->total}}</td>
    </tr>



  </table>
</div>


@stop
