@extends('layouts.app')
@section('content')
<div style="margin-left:125px; margin-top:40px; margin-right:140px">
@foreach ($messages as $message)
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $message->subject }}</h5>
        <p class="card-text">{{$message->content}}</p>   
        <p class="card-text"><small class="text-muted">{{$message->user->name}}</small></p>
        <hr>
        <form method="POST" action="/respond">
            @csrf
            <textarea style="margin-bottom:5px" class="form-control" name="reply" id="reply" rows="3"></textarea>
            <input type="hidden" name="usr_id" value="{{$message->user->id}}"></input>
            <input type="hidden" name="msg_id" value="{{$message->id}}"></input>
            <button action="submit" class="btn btn-primary waves-effect waves-light">Odgovori</button>
        </form>                    
    </div>
</div>
</div>
@endforeach
@endsection