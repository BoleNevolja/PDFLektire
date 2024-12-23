@extends('layouts.app')
@section('content')
    <div style="margin-left:2%; margin-top:40px">
        @if ($books->isEmpty())
            <h4 class="no-post"><i>NEMA REZULTATA</i>&#128531;</h4>
        @endif
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-5 g-0">
            @foreach ($books as $book)
                <a href="{{ url('/book/' . $book->id) }}">
                    <div class="col" style="margin-bottom:30px; margin:min(5px)">
                        <div class="card h-100" style="width:270px;max-width:100%; height:500px !important; max-height:500px">
                            <img class="card-img-top" src="{{ asset($book->thumbnail) }}" alt="thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <h6><i>{{ $book->author }}</i></h6>
                                <p class="card-text">
                                    {{ Str::limit($book->desc, 70) }}
                                </p>
                                @if ($book->textbook == 2)
                                    <div class="badge bg-primary rounded-pill ms-auto">LEKTIRA</div>
                                @else
                                    <br>
                                @endif
                                @if ($book->created_at->diffInDays() <= 7)
                                    <div class="badge bg-danger rounded-pill ms-auto">NOVO</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @if ($cc == 1)
        <script>
            document.getElementById("new-btn").classList.add("active");
        </script>
    @elseif($cc == 2)
        <script>
            document.getElementById("lek-btn").classList.add("active");
        </script>
    @elseif($cc == 3)
        <script>
            document.getElementById("our-btn").classList.add("active");
        </script>
    @else
        <script>
            document.getElementById("home-btn").classList.add("active");
        </script>
    @endif
@endsection
