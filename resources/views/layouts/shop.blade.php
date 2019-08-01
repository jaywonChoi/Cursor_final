<html>
<title>Cursor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-3.4.1.min.js"></script>

</script>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
.mySlides {
  display: none
}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><a href="{{route('Cursor')}}" style="text-decoration: none;"><b>Cursor</b></a></h3>
  </div>

  <div class="w3-large w3-text-grey" ><a href="{{route('shoppage')}}" class="w3-bar-item w3-button">Shop now </a></div>
  <div class="w3-padding-32 w3-large w3-text-grey" > Category

    <a href="{{route('cate.nonno')}}" class="w3-bar-item w3-button">nonno</a>
    <a href="{{route('cate.mensnonno')}}" class="w3-bar-item w3-button">Men's nonno</a>
    <a href="{{route('cate.anan')}}" class="w3-bar-item w3-button">anan</a>
    <a href="{{route('cate.seventeen')}}" class="w3-bar-item w3-button">Seventeen</a>
    <a href="{{route('cate.jelly')}}" class="w3-bar-item w3-button">Jelly</a>
    <a href="{{route('cate.leane')}}" class="w3-bar-item w3-button">リンネル</a>
    <a href="{{route('cate.nylon')}}"class="w3-bar-item w3-button">NYLON</a>

  </div>
  <div class="w3-large w3-text-grey" ><a href="#footer" class="w3-wide w3-bar-item w3-button w3-padding">Contact</a></div>
  <div class="w3-large w3-text-grey" ><a href="{{ route('admin')}}" class="w3-wide w3-bar-item w3-button w3-padding">ADMIN</a></div>
</nav>


<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide"><a href="{{route('Cursor')}}" style="text-decoration: none;">Cursor</a></div>
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
    <p class="w3-left"><a href="{{route('Cursor')}}" style="text-decoration: none;">Cursor<a></p>
      <p class="w3-right">
          @if(Auth::check())
          <a href="{{route('user.uprofile')}}" style="text-decoration:none;">{{ Auth::user()->uid }} 様</a>
          <a href="{{route('userlogout')}}" style="margin-left:5px"><i class="fa fa-sign-out w3-margin-right"></i></a>
          @else
          <a href="{{route('user.signin')}}"><i class="fa fa-sign-in w3-margin-right"></i></a>
          @endif
          <a href="{{route('cart.index')}}" class="fa fa-shopping-cart w3-margin-right" style="text-decoration:none;">
            @if(Cart::instance('default')->count()> 0)
            <i class="w3-badge">{{Cart::instance('default')->count()}}</i>
            @endif
          </a>
        <a href="search"><i class="fa fa-search"></i></a>
      </p>
  </header>

<div class="w3-container">
  <div class="col-25">
    @if(session()->has('success_message'))
    <div class="w3-panel w3-green w3-round">
      {{ session()->get('success_message')}}
    </div>
    @endif
  </div>
    @yield('content')
</div>


  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <!--find id  email X-->
          <form action="{{route('user.contact')}}" method="post">
          {{ csrf_field() }}
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="name" id="name" required></p>
          <p><input class="w3-input w3-border" type="email" placeholder="Email" name="email" id="email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Title" name="title" id="title" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Text" name="text" id="text" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Cursor </p>
        <p><i class="fa fa-fw fa-phone"></i> 010-000-0000 </p>
        <p><i class="fa fa-fw fa-envelope"></i> admin@cursor.co.jp </p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-credit-card"></i> ONLY Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">copyright Cursor</div>

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

// Slideshow Apartment Images
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}


</script>

</body>
</html>
