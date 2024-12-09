@extends('layouts.app')

<head>
    <title>PDFKnjige ┃ {{ $user->name }}</title>
</head>
@section('content')
<style>
    .hidden{
        display: none;
    }
</style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6">
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('/profile/' . $user->image_path) }}"
                                style="width:180px; height:180px"alt="user image"
                                class="rounded-circle d-block h-auto ms-0 ms-sm-6 rounded user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-6">{{ $user->name }}
                                        <h5><i>
                                                @if ($user->role == 2)
                                                    Admin
                                                @else
                                                    Korisnik
                                                @endif
                                            </i></h5>
                                        <ul
                                            class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                                            <li class="list-inline-item d-flex gap-2 align-items-center">
                                                <i class="ri-calendar-line"></i><span class="fw-medium">Pridružio se
                                                    {{ \Carbon\Carbon::parse($user->created_at)->locale('sr')->format('d F Y') }}</span>
                                            </li>
                                        </ul>
                                        @if(Auth::user()->id == $user->id)
                                        <a href="{{url("user/settings/" . $user->id)}}"><button style="margin-top:10px" type="button" class="btn btn-label-primary waves-effect"><i class="ri-edit-box-line" style="margin-right:3px"></i>Uredi profil</button></a>
                                        @endif
                                        @if($user->facebook != null)
                                        <a href="{{$user->facebook}}">
                                        <button href="{{$user->facebook}}" type="button"  style="height:35px;margin-top:10px" class="btn btn-icon btn-facebook waves-effect waves-light">
                                          <i style="height:25px" class="ri-facebook-box-fill"></i>
                                        </button></a>
                                        @endif
                                        @if($user->instagram != null)
                                        <a href="{{$user->instagram}}">
                                        <button href="{{$user->facebook}}" type="button"  style="height:35px;margin-top:10px" class="btn btn-icon btn-instagram waves-effect waves-light">
                                          <i style="height:25px" class="ri-instagram-fill"></i>
                                        </button></a>
                                        @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active waves-effect waves-light" onclick="down()" id="down" href="javascript:void(0)"><i class="ri-download-2-line"
                                    style="margin-right:5px"></i> Preuzimanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" id="favs" onclick="favorites()" href="javascript:void(0)"><i class="ri-hearts-line"
                                    style="margin-right:5px"></i> Omiljene</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="downloads">
          @if($user->download_status == 1 || Auth::user()->id == $user->id)
        @foreach($downloads as $download)
        <a href="{{url("book", $download->book->id)}}"><div class="row mb-12 g-6">
            <div class="col-md">
              <div class="card">
                <div class="row g-0">

                    <img class="card-img card-img-left" style="height:220px; width:220px" src="{{asset($download->book->thumbnail)}}" alt="Card image">
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$download->book->name}}</h5>
                      <p class="card-text">
                        {{$download->book->desc}}
                      </p>
                      <p class="card-text"><small class="text-muted">Preuzeto {{ $download->created_at->format('d F Y') }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <h4>Korisnik ne želi prikazati svoja preuzimanja</h4>
          @endif
        </div>


        <div id="favorites" class="hidden">
          @if($user->like_status == 1 || Auth::user()->id == $user->id)
             @foreach($favorites as $favorite)
            <a href="{{url("book", $favorite->book->id)}}"><div class="row mb-12 g-6">
                <div class="col-md">
                  <div class="card">
                    <div class="row g-0">
    
                        <img class="card-img card-img-left" style="height:220px; width:220px" src="{{asset($favorite->book->thumbnail)}}" alt="Card image">
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{$favorite->book->name}}</h5>
                          <p class="card-text">
                            {{$favorite->book->desc}}
                          </p>
                          <p class="card-text"><small class="text-muted">Dodano {{ $favorite->created_at->format('d F Y') }}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @else
            <h4>Korisnik ne želi prikazati svoje omiljene knjige</h4>
          @endif
        </div>


          <script>
            document.getElementById("profile-btn").classList.add("active");
            function down(){
                document.getElementById("down").classList.add("active");
                document.getElementById("downloads").classList.remove("hidden");
                document.getElementById("favs").classList.remove("active");
                document.getElementById("favorites").classList.add("hidden");
            }

            function favorites(){
                document.getElementById("down").classList.remove("active");
                document.getElementById("downloads").classList.add("hidden");
                document.getElementById("favs").classList.add("active");
                document.getElementById("favorites").classList.remove("hidden");
            }
        </script>
    @endsection
