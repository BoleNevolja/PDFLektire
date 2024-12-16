@extends('layouts.app')
@section('content')
    <style>
        .gg {
            margin-right: 10px;
        }

        .hidden {
            display: none;
        }

        .wc {
            margin-top: 25px;
        }
    </style>
    <div style="margin-left:2%; margin-top:10px">
        <div class="demo-inline-spacing">
            <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
                <li class="gg nav-item">
                    <a class="nav-link active waves-effect waves-light" id="edit-btn" onclick="edit()">
                        <i class="ri-edit-box-line" style="margin-right:3px"></i> Profil</a>
                </li>
                <li class="gg nav-item">
                    <a class="nav-link waves-effect waves-light" id="app-btn" onclick="app()">
                        <i class="ri-lock-2-line" style="margin-right:5px"></i> Privatnost</a>
                </li>
                <li class="gg nav-item">
                    <a class="nav-link waves-effect waves-light" id="prem-btn" onclick="prem()">
                        <i class="ri-vip-crown-2-line" style="margin-right:5px"></i> Premium</a>
                </li>
                @if ($user->author == 1)
                    <li class="gg nav-item">
                        <a class="nav-link waves-effect waves-light" id="auth-btn" onclick="auth()">
                            <i class="ri-quill-pen-line" style="margin-right:5px"></i> Autor</a>
                    </li>
                @endif
            </ul>
        </div>
        <div id="edit" class="edit wc">
            <form style="width:30%"method="POST" action="{{ url('/user/edit/' . $user->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ime</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Instagram</label>
                    <input type="text" class="form-control" value="{{ $user->instagram }}" name="insta" id="insta"
                        placeholder="Unesite URL Vašeg Instagram naloga">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Facebook</label>
                    <input type="text" class="form-control" value="{{ $user->facebook }}" name="face" id="face"
                        placeholder="Unesite URL Vašeg Facebook naloga">
                </div>
                <div class="mb-3 form-check">
                    <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Želim napraviti promjene</label>
                </div>
                <input type="hidden" name="s" value="social">
                <button type="submit" class="btn btn-primary">Primjeni promjene</button>
            </form>
        </div>
        <div id="app" class="hidden wc">
            <form method="POST" style="width:20%" action="{{ url('/user/edit/' . $user->id) }}">
                @csrf
                @method('PUT')
                <label for="like">Prikaži omiljene knjige</label>
                <select id="like" name="like" class="form-select">
                    <option value="0" {{ $user->like_status == 0 ? 'selected' : '' }}>Ne prikazuj ništa</option>
                    <option value="1"{{ $user->like_status == 1 ? 'selected' : '' }}>Prikaži sve</option>
                </select>
                <hr>
                <label for="download">Prikaži preuzimanja</label>
                <select id="download" name="download" class="form-select">
                    <option value="0" {{ $user->download_status == 0 ? 'selected' : '' }}>Ne prikazuj ništa</option>
                    <option value="1" {{ $user->download_status == 1 ? 'selected' : '' }}>Prikaži sve</option>
                </select>
                <hr>
                <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Želim napraviti promjene</label>
                <input type="hidden" name="s" value="priv">
                <button style="margin-top:20px" class="btn btn-primary" type="submit">Sačuvaj promjene</button>
            </form>
        </div>
        <div id="prem" class="hidden wc">
            @if ($user->vip != 1)
                <h4>Postani premium korisnik jednokratnom donacijom <a href="{{ route('donate') }}"><u>ovde</u></a></h4>
            @elseif($user->vip == 1)
                <h5>Hvala što si dio našeg puta &#x1F49C</h5>
                <form style="width:30%" method="POST" action="{{ url('/user/picture/' . $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Dodaj profilnu</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Objavi</button>
                    <hr>
                </form>
                <div class="mb-3">
                    <textarea row="2" style="width:30%" type="text" placeholder="Pošaljite direktnu poruku administratoru"
                        class="form-control" id="joke"></textarea>
                </div>
                <button onclick="joke()" class="btn btn-primary">Pošalji</button>
                <h6 id="joke-t" class="card-text hidden"><small class="text-muted">Poslano!</small></h6>
                <hr style="width:30%">
                <h6>Preuzimanja:</h6>
                <a href="{{url("summary")}}"><button class="btn btn-success">Lični izvještaj</button></a>
                <a href="{{url("vip")}}"> <button class="btn btn-success">Premium certifikat</button></a>
                <script>
                    function joke() {
                        document.getElementById("joke").value = ''
                        document.getElementById("joke-t").classList.remove("hidden");
                        setTimeout(function() {
                            document.getElementById("joke-t").classList.add("hidden");
                        }, 3000);
                    }
                </script>
            @endif
        </div>

        @if ($user->author == 1)
            <div id="auth" class="hidden wc">
                <div class="row mb-6"  style="margin-left:1%; margin-right:1%; margin-top:10px" id="sortable-cards">
                
                
                    <div class="col-lg-3 col-md-6 col-sm-12" style="">
                      <div class="card  mb-lg-0 mb-6">
                        <div class="card-body text-center">
                          <h2>
                            <i style="color:#9c60e0" class="ri-download-fill"></i>
                          </h2>
                          <h4>Preuzimanja</h4>
                          <h5>{{$downloads->count()}}</h5>
                        </div>
                      </div>
                    </div><div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="card mb-lg-0 mb-6">
                        <div class="card-body text-center">
                          <h2>
                            <i style="color:#1a9138" class="ri-money-dollar-circle-line"></i>
                          </h2>
                          <h4>Naknada</h4>
                          <h5>SOON</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="card mb-lg-0 mb-6">
                        <div class="card-body text-center">
                          <h2>
                            <i class="ri-user-line"></i>
                          </h2>
                          <h4>Posljednje preuzimanje</h4>
                          <h5>@if($latestDownload == null)Nema preuzimanja @else{{$latestDownload}}@endif</h5>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div style="margin-left:2%;margin-right:17%; margin-top:40px">
                  @foreach ($books as $book)
                          <div class="row mb-12 g-6" id="card-{{$book->id}}">
                              <div class="col-md">
                                  <div class="card">
                                      <div class="row g-0">
  
                                          <img class="card-img card-img-left" style="height:220px; width:220px"
                                              src="{{ asset($book->thumbnail) }}" alt="Card image">
                                          <div class="col-md-8">
                                              <div class="card-body">
                                                  <h3 class="card-title">{{ $book->name }}</h3>
                                                         <h5>{{ $book->downloads->count() }} preuzimanja</h5>
                                                         <button onclick="remove({{$book->id}})" class="btn btn-danger">Obriši knjigu</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                  @endforeach
                        </div>
            </div>
        @endif
    </div>
    <script>
        function remove(bookId){
            $.ajax({
            url: "{{ route('remove') }}",
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
        function edit() {
            document.getElementById("edit-btn").classList.add("active");
            document.getElementById("edit").classList.remove("hidden");

            document.getElementById("app-btn").classList.remove("active");
            document.getElementById("app").classList.add("hidden");

            document.getElementById("prem-btn").classList.remove("active");
            document.getElementById("prem").classList.add("hidden");

            document.getElementById("auth-btn").classList.remove("active");
            document.getElementById("auth").classList.add("hidden");
        }

        function app() {
            document.getElementById("app-btn").classList.add("active");
            document.getElementById("app").classList.remove("hidden");

            document.getElementById("edit-btn").classList.remove("active");
            document.getElementById("edit").classList.add("hidden");

            document.getElementById("prem-btn").classList.remove("active");
            document.getElementById("prem").classList.add("hidden");

            document.getElementById("auth-btn").classList.remove("active");
            document.getElementById("auth").classList.add("hidden");
        }

        function prem() {
            document.getElementById("prem-btn").classList.add("active");
            document.getElementById("prem").classList.remove("hidden");

            document.getElementById("edit-btn").classList.remove("active");
            document.getElementById("edit").classList.add("hidden");

            document.getElementById("app-btn").classList.remove("active");
            document.getElementById("app").classList.add("hidden");

            document.getElementById("auth-btn").classList.remove("active");
            document.getElementById("auth").classList.add("hidden");
        }

        function auth() {
            document.getElementById("edit-btn").classList.remove("active");
            document.getElementById("edit").classList.add("hidden");

            document.getElementById("app-btn").classList.remove("active");
            document.getElementById("app").classList.add("hidden");

            document.getElementById("prem-btn").classList.remove("active");
            document.getElementById("prem").classList.add("hidden");

            document.getElementById("auth-btn").classList.add("active");
            document.getElementById("auth").classList.remove("hidden");
        }
    </script>
@endsection
