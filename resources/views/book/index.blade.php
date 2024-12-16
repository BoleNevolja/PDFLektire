@extends('layouts.app')

<head>
    <title>PDFKnjige ┃ {{ $book->name }}</title>
</head>
@section('content')
    <style>
        .hidden {
            display: none;
        }
        #search-bar{
            margin-top: 15px;
        }
    </style>

    <div id="like-conf" style="margin-left:2%; margin-right:2%; margin-top:10px" class="hidden card shadow-none bg-success-subtle">
        <div class="card-body">
          <h5 class="card-title text-success"><b><i>{{$book->name}}</i></b> uspješno dodana u omiljene</h5>
        </div>
      </div>

      <div id="unlike-conf" style="margin-left:2%; margin-right:2%; margin-top:10px" class="hidden card shadow-none bg-danger-subtle">
        <div class="card-body">
          <h5 class="card-title text-danger"><b><i>{{$book->name}}</i></b> uspješno uklonjena iz omiljenih</h5>
        </div>
      </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6">
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset($book->thumbnail) }}" style="width:240px; height:240px"alt="user image"
                                class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-6">{{ $book->name }}
                                        @if ($book->textbook == 2)
                                            <div class="badge bg-primary rounded-pill ms-auto">LEKTIRA</div>
                                        @endif
                                    </h4>
                                    <h5><i>{{ $book->author }}</i></h5>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="ri-folder-zip-line"></i><span
                                                class="fw-medium">{{ $book->file_size }}kB</span>
                                        </li>
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="ri-calendar-line"></i><span class="fw-medium">Dodano
                                                {{ \Carbon\Carbon::parse($book->created_at)->locale('sr')->format('d F Y') }}</span>
                                        </li>
                                    </ul><br>
                                    <p>{{ $book->desc }}</p>
                                    <div class="row row-cols-1 row-cols-md-5 g-2">
                                    <a style="height:40px;width:130px" onclick="setTimeout(() => { new bootstrap.Modal(document.getElementById('addNewCCModal')).show(); }, 500);"
                                        href="{{ url('book/download/' . $book->id) }}"
                                        class="btn btn-primary mb-1 waves-effect waves-light">
                                        <i class="ri-download-2-line" style="margin-right: 5px"></i></i>Preuzmi
                                    </a>
                                    <div class="favorite-buttons">
                                        @if ($user->favoriteBooks->contains($book))
                                        <div id="unlike">
                                            <button style="height:40px;width:130px" id="unlike" onclick="removeFromFavorites({{ $book->id }})"
                                                href="javascript:void(0);"
                                                class="btn rounded-pill btn-danger mb-1 waves-effect waves-light">
                                                <i class="ri-heart-fill" style="margin-right: 5px"></i></i>Ukloni iz
                                                omiljenih
                                            </button></div>
                                            <div class="hidden" id="like">
                                                <button style="height:40px;width:130px" onclick="addToFavorites({{ $book->id }})"
                                                    href="javascript:void(0);"
                                                    class="btn rounded-pill btn-success mb-1 waves-effect waves-light">
                                                    <i class="ri-heart-line" style="margin-right: 5px"></i></i>Dodaj u
                                                    omiljene
                                                </button>
                                            </div>
                                        @else
                                            <div class="hidden" id="unlike">
                                                <button style="height:40px;width:130px" onclick="removeFromFavorites({{ $book->id }})"
                                                    href="javascript:void(0);"
                                                    class="hidden btn rounded-pill btn-danger mb-1 waves-effect waves-light">
                                                    <i class="ri-heart-fill" style="margin-right: 5px"></i></i>Ukloni iz
                                                    omiljenih
                                                </button>
                                            </div>
                                            <div id="like">
                                                <button style="height:40px;width:130px" onclick="addToFavorites({{ $book->id }})"
                                                    href="javascript:void(0);"
                                                    class="btn rounded-pill btn-success mb-1 waves-effect waves-light">
                                                    <i class="ri-heart-line" style="margin-right: 5px"></i></i>Dodaj u
                                                    omiljene
                                                </button>
                                            </div>
                                        @endif
                                    </div></div>
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
                            <a class="nav-link active waves-effect waves-light" id="pdf-btn" onclick="pdf()"><i
                                    class="ri-file-pdf-2-line" style="margin-right:5px"></i> PDF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light"onclick="com()" id="com-btn"><i
                                    class="ri-chat-1-line" style="margin-right:5px"></i> Komentari</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" onclick="dwn()" id="dwn-btn"><i
                                    class="ri-download-2-line" style="margin-right:5px"></i> Preuzimanja</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row" id="pdf">
            <iframe src="{{ asset($book->file_path) }}" width="100%" height="800px"></iframe>
        </div>

        <div class="comments hidden" id="com">
            <form method="POST" action="/addcomment">
                @csrf
                <div class="mb-3">
                    <textarea rows="4" type="text" name ="content" class="form-control" placeholder="Dodaj komentar" id="content"
                        aria-describedby="emailHelp"></textarea>
                    <input type="hidden" name="bookid" value="{{ $book->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Objavi</button>
            </form><br>
            @if ($comments->isEmpty())
                <h3>NEMA KOMENTARA</h3>
            @endif
            @foreach ($comments as $comment)
                <div id="delbtn-{{ $comment->id }}" class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->user->name }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $comment->content }}</small></p>
                        @if(Auth::user()->id == $comment->user->id)
                        <button class="btn btn-danger" onclick="deleteComment({{$comment->id}})"><i class="ri-delete-bin-line"></i>Obriši komentar</button>
                        @endif
                    </div>
                </div><br>
            @endforeach
        </div>

        <div class="downloads hidden" id="dwn">
            @if ($downloads->isEmpty())
                <h3>NEMA PREUZIMANJA</h3>
            @endif
            @foreach ($downloads as $download)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $download->user->name }}</h5>
                        <p class="card-text"><small class="text-muted">Preuzeo {{ $download->created_at }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            function deleteComment(commentId) {
        $.ajax({
            url: "{{ route('removecoment') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}", // Include CSRF token
                id: commentId
            },
            success: function(response) {
                document.getElementById("delbtn-" + commentId).classList.add("hidden");
                console.log("Success");
            },
            error: function(xhr) {
                console.log("Error");
            }
        });
    }
            function addToFavorites(bookId) {
                $.ajax({
                    url: '{{ route('like') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        book_id: bookId,
                    },
                    success: function(response) {
                        console.log("Success");
                        document.getElementById("unlike").classList.remove("hidden");
                        document.getElementById("like").classList.add("hidden");
                        document.getElementById("like-conf").classList.remove("hidden");
                        setTimeout(function() {
                            document.getElementById("like-conf").classList.add("hidden");
                        }, 2000);
                    },
                    error: function(xhr) {
                        console.log("Error");
                    }
                });
            }

            function removeFromFavorites(bookId) {
                $.ajax({
                    url: '{{ route('unlike') }}',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        book_id: bookId
                    },
                    success: function(response) {
                        console.log("Success");
                        document.getElementById("like").classList.remove("hidden");
                        document.getElementById("unlike").classList.add("hidden");
                        document.getElementById("unlike-conf").classList.remove("hidden");
                        setTimeout(function() {
                            document.getElementById("unlike-conf").classList.add("hidden");
                        }, 2000);
                    },
                    error: function(xhr) {
                        console.log("Error");
                    }
                });
            }

            function pdf() {

                document.getElementById("pdf-btn").classList.add("active");
                document.getElementById("pdf").classList.remove("hidden");

                document.getElementById("com-btn").classList.remove("active");
                document.getElementById("com").classList.add("hidden");

                document.getElementById("dwn-btn").classList.remove("active");
                document.getElementById("dwn").classList.add("hidden");
            }

            function com() {

                document.getElementById("com-btn").classList.add("active");
                document.getElementById("com").classList.remove("hidden");

                document.getElementById("pdf-btn").classList.remove("active");
                document.getElementById("pdf").classList.add("hidden");

                document.getElementById("dwn-btn").classList.remove("active");
                document.getElementById("dwn").classList.add("hidden");
            }

            function dwn() {

                document.getElementById("dwn-btn").classList.add("active");
                document.getElementById("dwn").classList.remove("hidden");

                document.getElementById("pdf-btn").classList.remove("active");
                document.getElementById("pdf").classList.add("hidden");

                document.getElementById("com-btn").classList.remove("active");
                document.getElementById("com").classList.add("hidden");
            }
        </script>
        <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="mb-2">Hvala, {{ Auth::user()->name }}&#x1F49C</h4>
                            <p>Možeš podržati naš dalji rad jednokratnom donacijom <a
                                    href="{{ url('donate') }}"><u>ovde</u></a>
                                &#x1F49C </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
