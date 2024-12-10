@extends("layouts.app")
@section("content")
<div style="margin-left:30px; width:90%; margin-top:40px;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $message->subject }}</h5>
            <p class="card-text">{{$message->content}}</p>   
            <p class="card-text"><small class="text-muted">{{$message->user->name}}</small></p>
            <hr>
            <h5 class="card-title">ODGOVOR:</h5>
            <p class="card-text">{{$answer->content}}</p> 
            <p class="card-text"><small class="text-muted">{{$answer->created_at}}</small></p>            
        </div>
    </div>
    </div>
</div>
@endsection