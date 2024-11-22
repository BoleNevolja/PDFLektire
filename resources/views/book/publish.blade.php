@extends('layouts.app')
@section('content')
<div style="margin-left:135px; margin-top:40px">
<form action="/published"  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3" style="width:50%">
      <label for="exampleInputEmail1" class="form-label">Naziv</label>
      <input required type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3" style="width:50%">
        <label for="exampleInputEmail1" class="form-label">Opis</label>
        <textarea required rows="4" type="text" class="form-control" id="desc" name="desc" placeholder="Najviše 512 slova"></textarea>
      </div>
      <div class="mb-3" style="width:50%">
        <label for="exampleInputEmail1" class="form-label">PDF</label>
        <input required type="file" class="form-control" id="book" aria-describedby="emailHelp" name="book">
      </div>
      <div class="mb-3" style="width:50%">
        <label for="exampleInputEmail1" class="form-label">Početna slika</label>
        <input required type="file" class="form-control" id="thumbnail" aria-describedby="emailHelp" name="thumbnail">
      </div>
      <div class="mb-3 form-check">
        <input required type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Pročitao sam pravila</label>
      </div>
    <button type="submit" class="btn btn-primary">Pošalji</button>
  </form>
  <p style="color:red">Klikom na POŠALJI prihvatam sve pravne posljedice ovog dokumenta</p><br>
  <h4>PROČITAJ PRIJE SLANJA</h4>
  <p><b>1.</b>Slanje dokumenta na adresu domaćina sajta korisnik na sebe prihvata svu pravnu odgovornost koju dokumenta može da donese<br>
    <b>2.</b>Slanjem dokumenta na adresu domaćina se odriče autorksih prava djela i ona pripadaju domaćinu sajta<br>
    <b>3.</b>Slanjem dokumenta korisnik konstantuje da je dokument dobio na legalan način<br>
    <b>4.</b>Slanjem dokumenta korisnik se odriče svoje mogućnosti njegovog uklanjanja<br>
    <b>5.</b>Slanjem dokumente dopuštate sajtu da je zadrži iako je ne objavi</p>
</div>
@endsection