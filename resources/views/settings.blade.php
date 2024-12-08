@extends("layouts.app")
@section("content")
<style>
    .gg{
        margin-right:10px;
    }
    .hidden {
            display: none;
        }
    .wc{
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
                    <i class="ri-paint-fill" style="margin-right:5px"></i> Izgled</a>
            </li>
            <li class="gg nav-item">
                <a class="nav-link waves-effect waves-light" id="prem-btn" onclick="prem()">
                    <i class="ri-download-2-line" style="margin-right:5px"></i> Download</a>
            </li>
        </ul>
    </div>
    <div id="edit" class="edit wc">
        <form method="POST" action="{{url("/user/edit/" . $user->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ime</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
                <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Želim napraviti promjene</label>
            </div>
            <button type="submit" class="btn btn-primary">Primjeni promjene</button>
        </form>
    </div>
    <div id="app" class="hidden wc">
        <h1>SOON</h1>
    </div>
    <div id="prem" class="hidden wc">
        <h1>SOON</h1>
    </div>
</div>
<script>
    function edit() {
    document.getElementById("edit-btn").classList.add("active");
    document.getElementById("edit").classList.remove("hidden");

    document.getElementById("app-btn").classList.remove("active");
    document.getElementById("app").classList.add("hidden");

    document.getElementById("prem-btn").classList.remove("active");
    document.getElementById("prem").classList.add("hidden");
}

function app() {
    document.getElementById("app-btn").classList.add("active");
    document.getElementById("app").classList.remove("hidden");

    document.getElementById("edit-btn").classList.remove("active");
    document.getElementById("edit").classList.add("hidden");

    document.getElementById("prem-btn").classList.remove("active");
    document.getElementById("prem").classList.add("hidden");
}

function prem() {
    document.getElementById("prem-btn").classList.add("active");
    document.getElementById("prem").classList.remove("hidden");

    document.getElementById("edit-btn").classList.remove("active");
    document.getElementById("edit").classList.add("hidden");

    document.getElementById("app-btn").classList.remove("active");
    document.getElementById("app").classList.add("hidden");
}

</script>
@endsection