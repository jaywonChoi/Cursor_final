<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Montserrat, sans-serif;
  font-size: 18px;
  background: #f2f2f2;
}

.clearfix:after {
  content: "";
  display: block;
  clear: both;
  visibility: hidden;
  height: 0;
}

.form_wrapper {
  background: #fff;
  width: 550px;
  max-width: 100%;
  box-sizing: border-box;
  padding: 25px;
  margin: 10% auto 0;
  position: relative;
  z-index: 1;
  border-top: 5px solid #f5ba1a;
  -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}
.form_wrapper h2 {
  font-size: 1.5em;
  line-height: 1.5em;
  margin: 0;
}
.form_wrapper .title_container {
  text-align: center;
  padding-bottom: 15px;
}
.form_wrapper h3 {
  font-size: 1.1em;
  font-weight: normal;
  line-height: 1.5em;
  margin: 0;
}
.form_wrapper .row {
  margin: 10px -15px;
}
.form_wrapper .row > div {
  padding: 0 15px;
  box-sizing: border-box;
}
.form_wrapper .col_half {
  width: 50%;
  float: left;
}
.form_wrapper .input_field {
  position: relative;
  margin-bottom: 20px;
}
.form_wrapper .input_field > span {
  position: absolute;
  left: 0;
  top: 0;
  color: #333;
  height: 100%;
  border-right: 1px solid #ccc;
  text-align: center;
  width: 30px;
}
.form_wrapper .input_field > span > i {
  padding-top: 10px;
}
.form_wrapper .textarea_field > span > i {
  padding-top: 10px;
}
.form_wrapper input[type="text"] {
  width: 100%;
  padding: 8px 10px 9px 35px;
  height: 35px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  outline: none;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="text"]:focus {
  -webkit-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  -moz-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  border: 1px solid #f5ba1a;
}
.form_wrapper input[type="email"] {
  width: 100%;
  padding: 8px 10px 9px 35px;
  height: 35px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  outline: none;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="email"]:focus {
  -webkit-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  -moz-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  border: 1px solid #f5ba1a;
}
.form_wrapper input[type="password"] {
  width: 100%;
  padding: 8px 10px 9px 35px;
  height: 35px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  outline: none;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="password"]:focus {
  -webkit-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  -moz-box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
  border: 1px solid #f5ba1a;
}
.form_wrapper input[type="submit"] {
  background: #f5ba1a;
  height: 35px;
  line-height: 35px;
  width: 100%;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-size: 1.1em;
  margin-bottom: 10px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="submit"]:hover {
  background: lightgray;
}
.form_wrapper input[type="submit"]:focus {
  background: #e1a70a;
}
.form_wrapper input[type="checkbox"] {
  margin-right: 4px;
}

.form_container .row .col_half.last {
  border-left: 1px solid #ccc;
}

.bottom_row {
  font-size: 0.7em;
  color: #ababab;
}
.bottom_row a {
  text-decoration: none;
  color: #ababab;
}

.credit {
  position: relative;
  z-index: 1;
  text-align: center;
  padding: 15px;
  color: #f5ba1a;
}
.credit a {
  color: #e1a70a;
}

@media (max-width: 600px) {
  .form_wrapper .col_half {
    width: 100%;
    float: none;
  }

  .bottom_row .col_half {
    width: 50%;
    float: left;
  }

  .form_container .row .col_half.last {
    border-left: none;
  }

  .remember_me {
    padding-bottom: 20px;
  }
}
</style>
<script type="text/javascript">
function check(){
  var form = document.forms["signup"]["email"].value;
  if (form == "") {
    alert("Enter email!!");
    return false;
  }
  var check = document.forms["signup"]["password"].value;
  var check2 =document.forms["signup"]["pwcheck"].value;
  if (check != check2) {
    alert("No match");
    return false;
  }

  return true;
}

</script>

<body>
  @if(session()->has('error_messages'))
  <div class="w3-panel w3-green w3-round">
    {{ session()->get('error_messages')}}
  </div>
  @endif

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Cursor Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form name="signup" action="{{route('user.postsignup')}}" method="post" onsubmit="return check()">
          {{ csrf_field() }}
          <div class="input_field"> <span><i class="fa fa-user"></i></span>
            <input type="text" name="uid" id="uid" placeholder="ID" />

          </div>

          <div class="input_field"> <span><i class="fa fa-lock"></i></span>
            <input type="password" name="password" id="password" placeholder="Password" required/>
          </div>
          <div class="input_field"> <span><i class="fa fa-lock"></i></span>
            <input type="password" id="pwcheck" placeholder="Password Check" required/>
          </div>
          <div class="input_field"> <span><i class="fa fa-envelope"></i></span>
            <input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i class="fa fa-user"></i></span>
                <input type="text" name="fullname" id="fullname" placeholder="山田太郎" required/>
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i class="fa fa-user"></i></span>
                <input type="text" name="phone" id="phone" placeholder="070-0000-0000" required/>
              </div>
            </div>
          </div>
          <div class="input_field select_option">
          <select id="sex" name="sex">
              <option>Male</option>
              <option>Female</option>
            </select>
            <div class="select_arrow"></div>
          </div>

          <input class="button" type="submit" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
