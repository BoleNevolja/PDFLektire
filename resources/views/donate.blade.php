@extends('layouts.app')
@section('content')
<div style="margin-left:3%; margin-top:40px">
  <h4>Podrži naš rad &#x1F49C</h4>
  <a href="https://buymeacoffee.com/bolenevolja"><button class="btn btn-warning"><i class="ri-drinks-line" style="margin-right: 3px"></i> Buy Me a Coffee</button></a><br><br>
  <a href="https://www.paypal.com/paypalme/BoskoPetkovic"><button class="btn btn-info"><i class="ri-paypal-line" style="margin-right: 3px"></i> PayPal</button></a><br><hr style="width:30%">
  <h5>Kako dobiti Premium account?</h5>
  <p>Ako plaćate preko <i>Buy Me a Coffee</i> napišite u poruci Vaše korisničko ime</p>
  <p>Ako plaćate preko <i>PayPala</i> kao razlog uplate stavite Vaše korisničko ime</p>
  <p>Ako je od Vaše donacije prošlo više od 24h i niste dobili pristup Premium opcijama kontaktirajte admina <b><i>bosko.petkovic.4@gmail.com</i></b> </p>
</div>
<script>
  document.getElementById("donate-btn").classList.add("active");
</script>
@endsection