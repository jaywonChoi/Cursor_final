@extends('layouts.cartheader')
@section('content')

<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
<script>

</script>

<div class="container" style="margin-top:5%">
    <div class="container" style="width:50%;float:right">
        <div class="w3-container">
          <ul class="w3-ul w3-card-4">
            @foreach(Cart::content() as $item)
            <li class="w3-bar">

              <img src="{{asset('/uploads/'.$item->model->main)}}" class="w3-bar-item w3-square" style="width:80px">
              <div class="w3-bar-item" style="width:37%">
                <span class="w3-large">{{$item->model->ptitle}}</span>
              </div>
              <div class="w3-bar-item" style="width:20%">
                <div>
                <span class="w3-large">{{ $item->qty }}冊</span>
              </div>
              </div>
              <div class="w3-bar-item">
                <span class="w3-large">￥{{ Cart::get($item->rowId)->subtotal()}}</span>
              </div>
            </li>
              @endforeach
          </ul>
        </div>
        <div class="w3-container" style="background-color:#f2f2f2;border-radius:3px;margin:5%;text-align:right">
          <p>Quantity: {{ Cart::count() }}冊</p>
          <p>SubTotal: ￥{{ Cart::subtotal()}}</p>
          <p>Tax(8%):  ￥{{ Cart::tax()}}</p>
          <p>Total:    ￥{{ Cart::total() }}</p>
        </div>
    </div>

        <div class="container" style="width:50%">
          <div class="container">

          <form action="{{route('pay.checking')}}" id="payment-form" method="post">

            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                @if(Auth::check())
                <label for="name"><i class="fa fa-user"></i>お名前</label><br>
                <input type="text" id="fullname" name="fullname" placeholder="山田太郎" value="{{Auth::user()->uid}}"><br>
                <label for="email"><i class="fa fa-envelope"></i>Email</label><br>
                <input type="text" id="email" name="email" placeholder="john@example.com" value="{{Auth::user()->email}}"><br>
                <label for="adr"><i class="fa fa-address-card-o"></i>郵便番号</label><br>
                <input type="text" id="zip01" name="zip01"  maxlength="8" onkeyup="AjaxZip3.zip2addr(this,'','pref01','addr01');" placeholder="ハイフンも大丈夫です！"required><br>
                <label for="city"><i class="fa fa-institution"></i>都道府県</label><br>
                <input type="text"  name="pref01" id="pref01"><br>
                <label for="city"><i class="fa fa-institution"></i>市区町村</label><br>
                <input type="text"  name="addr01" id="addr01"><br>
                <label for="city"><i class="fa fa-institution"></i>その他住所</label><br>
                <input type="text" id="city01" name="city01" placeholder="番地や建物名（部屋番号）" required><br>
                <label for="city"><i class="fa fa-institution"></i>お電話番号</label><br>
                <input type="text" id="phone" name="phone" placeholder="030-0000-0000" value="{{Auth::user()->phone}}"><br>
                @endif
              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>

                </div>
                <label for="cname">Name on Card</label><br>
                <input type="text" id="cname" name="cname" placeholder="Yamada Taro" required><br>
                <p>カード番号は 4242 4242 4242 4242 で</p>
                <p>月／ 年 CVC 好きな番号でお願いします。</p>
                  <label>
                    <span>Card</span>
                    <div id="card-element" class="field"></div>
                  </label>
                    {{ csrf_field() }}
                  <button type="submit" class="w3-button w3-teal" >Pay </button>
                  <div class="outcome">
                   <div id="card-errors" role="alert"></div>
                  </div>
                </div>
              </div>
            </div>
          </form>





</div>

@section('scripts')

<script src="https://js.stripe.com/v3/"></script>
<script>

 var stripe = Stripe('pk_test_olJRLqJ8hgGkyAlHFkeSHn5L00npmfo8ZU');

 var elements = stripe.elements({
  fonts: [
    {
      family: 'Open Sans',
      weight: 400,
      src: 'local("Open Sans"), local("OpenSans"), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3ZBw1xU1rKptJj_0jans920.woff2) format("woff2")',
      unicodeRange: 'U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215',
    },
  ]
});
var card = elements.create('card', {
  hidePostalCode: true,
  style: {
    base: {
      iconColor: '#F99A52',
      color: '#32315E',
      lineHeight: '48px',
      fontWeight: 400,
      fontFamily: '"Open Sans", "Helvetica Neue", "Helvetica", sans-serif',
      fontSize: '15px',
      '::placeholder': {
        color: '#CFD7DF',
      }
    },
  }
});
card.mount('#card-element');

card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});


var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {

      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {

      stripeTokenHandler(result.token);
    }

  });
});

function stripeTokenHandler(token) {

  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  form.submit();
}
</script>

@endsection
@stop
