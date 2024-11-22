@extends('layouts.app')
@section("content")
<div style="margin-left:125px; margin-right:50px; margin-top:30px">
<div class="card shadow-none bg-success-subtle">
    <div class="card-body">
      <h5 class="card-title text-success">Status knjige {{$newBook->name}}:@if($newBook->status == 1) NA PREGLEDU @else JAVNO @endif</h5>
      <p class="card-text text-success">
        Dobiti ćete notifikaciju u slučaju nekih promjena
      </p>
    </div>
  </div>
</div>
@endsection