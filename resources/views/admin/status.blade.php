@extends('layouts.app')
@section('content')
<style>
    .hidden{
        display: none;
    }
</style>
    <div style="margin-left:3%;margin-right:3%; margin-top:40px">
            @foreach ($books as $book)
                          <div id="card-{{$book->id}}" class="row mb-12 g-6">
                              <div class="col-md">
                                  <div class="card">
                                      <div class="row g-0">
  
                                          <img class="card-img card-img-left" style="height:200px; width:200px"
                                              src="{{ asset($book->thumbnail) }}" alt="Card image">
                                          <div class="col-md-8">
                                              <div class="card-body">
                                                  <h5 class="card-title">{{ $book->name }}</h5>
                                                  <p class="card-text">
                                                      {{ $book->desc }}
                                                  </p>
                                                  <button onclick="accept({{$book->id}})" class="btn btn-success">Odobri</button>
                                                  <button onclick="reject({{$book->id}})" class="btn btn-danger">Odbij</button>
                                                  <a href="{{ url('book', $book->id) }}">
                                                  <button class="btn btn-primary">Više informacija</button></a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                  @endforeach
    </div>
    <script>
    function accept(bookId) {
        $.ajax({
            url: "{{ route('accept') }}",
            type: "PUT",
            data: {
                _token: "{{ csrf_token() }}",
                id: bookId
            },
            success: function(response) {
                document.getElementById("card-" + bookId).classList.add("hidden");
                console.log("Success");
            },
            error: function(xhr) {
                console.log("Error");
            }
        });
    }

    function reject(bookId) {
        $.ajax({
            url: "{{ route('reject') }}",
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}",
                id: bookId
            },
            success: function(response) {
                document.getElementById("card-" + bookId).classList.add("hidden");
                console.log("Success");
            },
            error: function(xhr) {
                console.log("Error");
                document.getElementById("card-" + bookId).classList.add("hidden");
            }
        });
    }
    </script>
@endsection