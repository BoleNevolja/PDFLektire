@extends('layouts.app')

<head>
    <title>PDFKnjige ┃ {{ $user->name }}</title>
</head>
@section('content')
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
                            <a class="nav-link active waves-effect waves-light" href="#####"><i class="ri-download-2-line"
                                    style="margin-right:5px"></i> Preuzimanja</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection