@extends('layouts.adminheader')
@section('content')


<div class="w3-container">
  <h2>在庫管理</h2>

  <table class="w3-table w3-striped">
    <tr>
      <th>商品番号</th>
      <th>商品名</th>
      <th>在庫</th>
      <th>オーダ数</th>
    </tr>

    @foreach($products as $p)

    <tr>
      <td>{{$p->pname}}</td>
      <td>{{$p->ptitle}}</td>
      <td>{{$p->quan}}</td>

      
    </tr>

    @endforeach
</table>

</div>


@stop
