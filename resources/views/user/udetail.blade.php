@extends('layouts.header')
@section('content')

<div class="w3-container" >
  <table class="w3-table w3-bordered" style="margin-bottom:300px">

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
