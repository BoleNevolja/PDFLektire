@extends('layouts.app')

<head>
    <title>PDFKnjige ┃ {{ $user->name }}</title>
</head>
@section('content')
    <style>
        #search-bar {
            margin-top: 15px;
        }

        .hidden {
            display: none;
        }

        .ri-vip-crown-2-line {
            font-size: 30px;
            color: #ffd700;
            background: linear-gradient(45deg, #ffd700 25%, #f5c500 50%, #ffd700 75%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 2px rgba(255, 215, 0, 0.5);
        }

        .ri-pen-nib-line {
            font-size: 30px;
            color: #333;
            background: linear-gradient(45deg, #333 25%, #555 50%, #333 75%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5), 0 1px 2px rgba(255, 255, 255, 0.3);
        }

        .ri-user-settings-line {
            font-size: 30px;
            background: linear-gradient(90deg, #007bff, #00c6ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        #user-image {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        #user-image.enlarged {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(3);
            z-index: 1000;
            max-width: 100vw;
            max-height: 100vh;
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
                                class="rounded-circle d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" id="user-image">
                        </div>
                        <script>
                            const image = document.getElementById('user-image');

                            // Add a click event listener to toggle the enlarged class
                            image.addEventListener('click', function() {
                                // Toggle the "enlarged" class on the image
                                image.classList.toggle('enlarged');
                            });
                        </script>
                        <div class="flex-grow-1 mt-3 mt-lg-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h3 class="mb-2 mt-lg-6">{{ $user->name }} @if ($user->vip == 1)
                                            <i class="ri-vip-crown-2-line"></i>
                                        @endif
                                        @if ($user->author == 1)
                                            <i class="ri-pen-nib-line"></i>
                                        @endif
                                        @if ($user->role == 2)
                                            <i class="ri-user-settings-line"></i>
                                        @endif
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
                                        @if (Auth::user()->id == $user->id)
                                            <a href="{{ url('user/settings/' . $user->id) }}"><button
                                                    style="margin-top:10px" type="button"
                                                    class="btn btn-label-primary waves-effect"><i class="ri-edit-box-line"
                                                        style="margin-right:3px"></i>Uredi profil</button></a>
                                        @endif
                                        @if ($user->facebook != null)
                                            <a href="{{ $user->facebook }}">
                                                <button href="{{ $user->facebook }}" type="button"
                                                    style="height:35px;margin-top:10px"
                                                    class="btn btn-icon btn-facebook waves-effect waves-light">
                                                    <i style="height:25px" class="ri-facebook-box-fill"></i>
                                                </button></a>
                                        @endif
                                        @if ($user->instagram != null)
                                            <a href="{{ $user->instagram }}">
                                                <button href="{{ $user->facebook }}" type="button"
                                                    style="height:35px;margin-top:10px"
                                                    class="btn btn-icon btn-instagram waves-effect waves-light">
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
                            <a class="nav-link active waves-effect waves-light" onclick="down()" id="down"
                                href="javascript:void(0)"><i class="ri-download-2-line" style="margin-right:5px"></i>
                                Preuzimanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" id="favs" onclick="favorites()"
                                href="javascript:void(0)"><i class="ri-hearts-line" style="margin-right:5px"></i>
                                Omiljene</a>
                        </li>
                        @if ($user->author == 1)
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light" id="my" onclick="my()"
                                    href="javascript:void(0)"><i class="ri-git-repository-line"
                                        style="margin-right:5px"></i>
                                    {{ $user->name }} knjige</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div id="downloads">
            @if ($user->download_status == 1 || Auth::user()->id == $user->id)
                @foreach ($downloads as $download)
                    <a href="{{ url('book', $download->book->id) }}">
                        <div class="row mb-12 g-6">
                            <div class="col-md">
                                <div class="card">
                                    <div class="row g-0">

                                        <img class="card-img card-img-left" style="height:220px; width:220px"
                                            src="{{ asset($download->book->thumbnail) }}" alt="Card image">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $download->book->name }}</h5>
                                                <p class="card-text">
                                                    {{ $download->book->desc }}
                                                </p>
                                                <p class="card-text"><small class="text-muted">Preuzeto
                                                        {{ $download->created_at->format('d F Y') }}</small></p>
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
            @if ($user->like_status == 1 || Auth::user()->id == $user->id)
                @foreach ($favorites as $favorite)
                    <a href="{{ url('book', $favorite->book->id) }}">
                        <div class="row mb-12 g-6">
                            <div class="col-md">
                                <div class="card">
                                    <div class="row g-0">

                                        <img class="card-img card-img-left" style="height:220px; width:220px"
                                            src="{{ asset($favorite->book->thumbnail) }}" alt="Card image">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $favorite->book->name }}</h5>
                                                <p class="card-text">
                                                    {{ $favorite->book->desc }}
                                                </p>
                                                <p class="card-text"><small class="text-muted">Dodano
                                                        {{ $favorite->created_at->format('d F Y') }}</small></p>
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

        <div id="mine" class="hidden">
            @foreach ($books as $book)
                <a href="{{ url('book', $book->id) }}">
                    <div class="row mb-12 g-6">
                        <div class="col-md">
                            <div class="card">
                                <div class="row g-0">

                                    <img class="card-img card-img-left" style="height:220px; width:220px"
                                        src="{{ asset($book->thumbnail) }}" alt="Card image">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $book->name }}</h5>
                                            <p class="card-text">
                                                {{ $favorite->book->desc }}
                                            </p>
                                            <p class="card-text"><small class="text-muted">Objavljeno
                                                    {{ $book->created_at->format('d F Y') }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>


        <script>
            document.getElementById("profile-btn").classList.add("active");

            function down() {
                document.getElementById("down").classList.add("active");
                document.getElementById("downloads").classList.remove("hidden");
                document.getElementById("favs").classList.remove("active");
                document.getElementById("favorites").classList.add("hidden");
                document.getElementById("my").classList.remove("active");
                document.getElementById("mine").classList.add("hidden");
            }

            function favorites() {
                document.getElementById("down").classList.remove("active");
                document.getElementById("downloads").classList.add("hidden");
                document.getElementById("favs").classList.add("active");
                document.getElementById("favorites").classList.remove("hidden");
                document.getElementById("my").classList.remove("active");
                document.getElementById("mine").classList.add("hidden");
            }

            function my() {
                document.getElementById("down").classList.remove("active");
                document.getElementById("downloads").classList.add("hidden");
                document.getElementById("favs").classList.remove("active");
                document.getElementById("favorites").classList.add("hidden");
                document.getElementById("my").classList.add("active");
                document.getElementById("mine").classList.remove("hidden");
            }
        </script>
    @endsection
