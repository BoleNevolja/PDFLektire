@extends('layouts.app')
@section('content')
    <div style="margin-left:125px; margin-top:40px">
        <div class="row row-cols-1 row-cols-md-5 g-2">
            @foreach ($books as $book)
                <a href="{{ url('/book/' . $book->id) }}">
                    <div class="col">
                        <div class="card h-100" style="width:300px; height:600px; max-height:600px">
                            <img class="card-img-top" src="{{ asset($book->thumbnail) }}" alt="thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <h6><i>{{ $book->author }}</i></h6>
                                <p class="card-text">
                                    {{ Str::limit($book->desc, 70) }}
                                </p>
                                @if ($book->textbook == 2)
                                    <div class="badge bg-primary rounded-pill ms-auto">LEKTIRA</div>
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
@endsection