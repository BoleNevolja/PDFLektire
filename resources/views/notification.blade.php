@extends('layouts.app')
@section('content')
<div style="margin-left:125px; margin-top:40px; margin-right:140px">
@foreach ($notifications as $notification)
<a href="####">
    <div class="alert alert-primary alert-dismissible" role="alert">
    @if($notification->content_type == 1)
    <h4 style="color:#8152a1; margin-bottom:2px">{{Auth::user()->name}}, Vaša poruka je dobila odgovor</h4>
    @else
    <h4 style="color:#8152a1; margin-bottom:2px">{{Auth::user()->name}}, knjiga koja Vam se sviđa dobila je promjenu</h4>
    @endif
    <p>{{$notification->short_text}}<p></a>
    <button type="button" onclick="mark({{$notification->id}})" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endforeach
</div>
@endsection

<script>
    function mark(arg){
        console.log(arg);

        $.ajax({
            url: '/notification/delete',
            type: "DELETE",
            data: {
                notification_id: arg
            },
            dataType: "json",
            success: function (data) {
                console.log("Success");
            },
            error: function (data) {
                console.log("Error", data);
            }
        });
    }
</script>

