@extends('layouts.adminheader')
@section('content')


<div class="w3-container">
  <h2>Orders</h2>


  <table class="w3-table w3-striped">
    <tr>
      <th>選択</th>
      <th>注文日時</th>
      <th>注文番号</th>
      <th>注文者</th>
      <th>合計金額</th>
      <th>決済</th>
      <th>発送</th>
      <th>メール</th>
    </tr>
    @foreach($orders as $order)
    <tr>
      <td><input type="checkbox"></td>
      <td>{{$order->created_at}}</td>
      <td><a href="{{route('admin.detail',$order->id)}}">{{$order->id}}</a></td>
      <td>{{$order->fullname}}</td>
      <td>{{$order->total}}</td>
      <td>{{$order->payment_id}}</td>
      <td></td>
      <td></td>
    </tr>
    @endforeach
  </table>
</div>


@stop
