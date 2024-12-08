@extends('layouts.app')

@section('content')
<style>
  * {
      box-sizing: border-box;
  }

  .q {
      margin-top: 20px;
      margin-left: 30px;
      margin-right: 30px;
      width: 90%;
      max-width: 1150px; /* Maintains the intended maximum width */
  }
</style>
<div style="margin-left:3%; margin-right:3%">
  <div class="accordion mt-4 accordion-header-primary" id="accordionStyle1">
    <div class="accordion-item card">
      <h2 class="accordion-header">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-1" aria-expanded="false">
          Postoji li ograničen broj knjiga koje se mogu preuzeti?
        </button>
      </h2>
  
      <div id="accordionStyle1-1" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1" style="">
        <div class="accordion-body">
          <b>Ne.</b> Možete da preuzimate neograničen broj knjiga sa našeg sajta.
        </div>
      </div>
    </div>
  
    <div class="accordion-item card">
      <h2 class="accordion-header">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-2" aria-expanded="false">
          Da li aplikacija omogućava čitanje knjiga direktno ili se ipak moraju preuzeti?
        </button>
      </h2>
      <div id="accordionStyle1-2" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1">
        <div class="accordion-body">
          Da biste čitali knjige sa našeg sajta <b>morate ih prvo preuzeti</b>.
        </div>
      </div>
    </div>
  
    <div class="card accordion-item">
      <h2 class="accordion-header">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-3" aria-expanded="false">
          Kako mogu da preporučim knjige za dodavanje na sajt?
        </button>
      </h2>
      <div id="accordionStyle1-3" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1" style="">
        <div class="accordion-body">
          Za preporučivanje knjiga možete da nam se obratite <a href="{{url("contact")}}"><u>ovde</u></a>
        </div>
      </div>
    </div>

    <div class="card accordion-item">
      <h2 class="accordion-header">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-4" aria-expanded="false">
          Koje formate knjiga aplikacija podržava osim PDF-a?
        </button>
      </h2>
      <div id="accordionStyle1-4" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1" style="">
        <div class="accordion-body">
          <b>Samo PDF.  </b>
        </div>
      </div>
    </div>

    <div class="card accordion-item">
      <h2 class="accordion-header">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyle1-5" aria-expanded="false">
          Mogu li da kreiram listu omiljenih knjiga?
        </button>
      </h2>
      <div id="accordionStyle1-5" class="accordion-collapse collapse" data-bs-parent="#accordionStyle1" style="">
        <div class="accordion-body">
          <b>###</b>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection