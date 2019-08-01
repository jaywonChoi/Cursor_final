@extends('layouts.adminheader')
@section('content')


<div class="w3-container">
  <h2>お問い合わせ</h2>

  <table class="w3-table w3-striped">
    <tr>
      <th>日時</th>
      <th>番号</th>
      <th>Name</th>
      <th>Title</th>
      <th>Text</th>
      <th>メール</th>
    </tr>
    @foreach($contacts as $c)
    <tr>
      <td>{{$c->created_at}}</td>
      <td>{{$c->id}}</td>
      <td>{{$c->name}}</td>
      <td>{{$c->title}}</td>
      <td>{{$c->text}}</td>
      <td>{{$c->email}}</td>
    </tr>
    @endforeach
  </table>
</div>


@stop
