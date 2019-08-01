@extends('layouts.header')
@section('content')

<div class="container">
  <div class="w3-container">
    <h4>ようこそ{{ Auth::user()->uid }}様</h4>
    <p>いつもご利用ありがとうございます。</p>
  </div>
  <div class="w3-container">
    <a href="{{route('user.profileupdate')}}"><h4>会員登録情報編集</h4></a>

  </div>
  <div class="w3-container" style="margin-bottom:100px">
    <h4>購入履歴</h4>

    <table class="w3-table w3-bordered">
      <tr>
        <th>注文日時</th>
        <th>注文番号</th>
        <th>商品名</th>

      </tr>
      @foreach($orders as $order)
      @foreach($order->products as $p)
      <tr>
        <td>{{$order->created_at}}</td>
        <td><a href="{{route('user.udetail',$order->id)}}">{{$order->id}}</a></td>
        <td>{{$p->ptitle}}</td>
      </tr>
      @endforeach
      @endforeach
    </table>
  </div>
</div>




@stop
