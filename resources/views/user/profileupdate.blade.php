@extends('layouts.header')
@section('content')
<script type="text/javascript">
function check(){
  var form = document.forms["userupdate"]["email"].value;
  if (form == "") {
    alert("Enter email!!");
    return false;
  }
  var check = document.forms["userupdate"]["password"].value;
  var check2 =document.forms["userupdate"]["pwcheck"].value;
  if (check != check2) {
    alert("No match");
    return false;
  }
  return true;
}

</script>

<div class="container">
  <div class="w3-container">
    <h4>ようこそ{{ Auth::user()->uid }}様</h4>
    <p>いつもご利用ありがとうございます。</p>
  </div>
  <div class="w3-container">
  <h4>会員登録情報編集</h4>
  <form name="userupdate" action="{{route('user.update')}}" method="post" onsubmit="return check()">
    <table class="w3-table w3-bordered" >
      {{ csrf_field() }}
      <p>注文情報</p>
      <tr>
        <th>UserID</th>
        <td>{{Auth::user()->uid}}</td>
      </tr>
      <tr>
        <th>Password</th>
        <td><input type="password" name="password" id="password" placeholder="Enter Password"></td>
      </tr>
      <tr>
        <th>Password Check</th>
        <td><input type="password" id="pwcheck" placeholder="Password Check"></td>
      </tr>
      <tr>
        <th>Fullname</th>
        <td>{{Auth::user()->fullname}}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td><input type="email" name="email" id="email" value="{{Auth::user()->email}}"></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><input type="text" name="phone" id="phone" value="{{Auth::user()->phone}}"></td>
      </tr>
      <tr>
        <th>Gender</th>
        <td>{{Auth::user()->sex}}</td>
      </tr>
    </table>
    <div style="text-align: center;margin: 25px;">
        <input class="w3-button w3-black w3-padding-large w3-large" type="submit" value="Update" />
    </div>

  </form>

  </div>

</div>




@stop
