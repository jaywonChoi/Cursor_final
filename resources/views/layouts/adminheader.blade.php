<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="jquery-3.4.0.min.js"></script>
<script type="text/javascript"></script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><a href="{{route('adminpage')}}" style="text-decoration: none;"><b>Cursor/Admin</b></a></h3>
  </div>

  <div class="w3-padding-32 w3-large w3-text-grey" >
    <a href="{{route('admin.orders')}}" class="w3-bar-item w3-button">ORDERS</a>
    <a href="{{route('admin.contact')}}" class="w3-bar-item w3-button">Contacts</a>
    <a href="{{route('upload')}}" class="w3-bar-item w3-button">Product_create</a>
    <a href="{{route('product.list')}}" class="w3-bar-item w3-button">Product_list</a>
    <a href="{{route('admin.qty')}}" class="w3-bar-item w3-button">Product_Qty</a>
    <a href="#" class="w3-bar-item w3-button">STAFF</a>
  </div>
  <div class="w3-large w3-text-grey" ><a href="{{ URL('logout')}}" class="w3-wide w3-bar-item w3-button w3-padding">LOGOUT</a></div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide"><a href="{{route('adminpage')}}" style="text-decoration: none;">Cursor/Admin</a></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left"><a href="{{route('Cursor')}}" style="text-decoration: none;">Cursor/Admin<a></p>
    <p class="w3-right">
        <a href="#">Welcome {{ Session::get('adminid') }}</a>
    </p>
  </header>


  <div class="w3-container">
      @yield('content')
  </div>
  <!-- End page content -->
  </div>

  <script>
  // Accordion
  function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }


  // Open and close sidebar
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
  }

  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";

  }
  </script>

  </body>
  </html>
