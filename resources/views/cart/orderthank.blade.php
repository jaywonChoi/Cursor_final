@extends('layouts.cartheader')
@section('content')

<div class="container">
  <div class="col-25">
  @if(session()->has('success_message'))
  <div class="w3-panel w3-green w3-round">
    {{ session()->get('success_message')}}
  </div>
  @endif
</div>
<h3>{{Auth::user()->uid}}様、ご注文ありがとうございます。</h3>
<a href="{{route('user.uprofile')}}">注文確認</a>
</div>

@stop
