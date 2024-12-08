@extends('layouts.app')
@section('content')
<div style="margin-left:125px; margin-top:40px">
<form method="POST" action="/sent">
  @csrf
    <div class="mb-3" style="width:50%">
      <label for="exampleInputEmail1" class="form-label">Predmet</label>
      <input type="text" class="form-control" required id="subject" name="subject">
    </div>
    <div class="mb-3" style="width:50%">
        <label for="exampleInputEmail1" class="form-label">Poruka</label>
        <textarea rows="4" type="text" required class="form-control" id="content" name="content"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Pošalji</button>
  </form><br>
  <h4>Možda smo odgovorili na Vaše pitanje <u><a href="{{url("faq")}}">ovde</a></u></h4>
</div>
<script>
  document.getElementById("contact-btn").classList.add("active");
</script>
@endsection
