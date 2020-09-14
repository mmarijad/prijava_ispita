@extends('ispiti.okvir')

@section('sadrzaj')

<hr>
@if ($prijava->count() == 1)
<div class = "row">
<div class="col-md-1"> </div>
    <div class="col-md-10">
    <div class="card">
    <div class="card-body">
    <h5>Već ste prijavili ovaj ispit!</h5>
        </div>
        </div>
    </div>
</div>

@else 
<div class = "row">
<div class="col-md-1"> </div>
    <div class="col-md-10">
    <div class="card">
    <div class="card-body">
    
    @foreach($ispit as $ispiti) 
    <form action="{{ route('ispiti.prijavi', $ispiti->is)}}" method="POST">
    @csrf <!-- Svaka forma mora imati CSRF token! -->
    <h5> Prijava ispita iz predmeta {{$ispiti->ime}}</h5>
        <hr>
        <br>
        @if ($brojac > 4)  
            <h6 style="color:#cf1406;"> Prekoračili ste maksimalan broj neplaćenih polaganja ovog kolegija! </h6>

        @elseif  ($prijava->count() == 1)
            <h5>Već ste prijavili ovaj ispit!</h5>

        @elseif  ( $vrijeme < $sad )
            <h5> Istekao rok prijave! </h5>

        @else
          <p> 
          Vrijeme odrzavanja: {{$ispiti->vrijeme_odrzavanja}} <hr>
          Prijava do: {{$ispiti->prijava_do}} <hr>
          Sezona ispita: {{$ispiti->sezona}} <hr>
          Student: {{$ispiti->name}} <hr>
          Broj indeksa: {{$ispiti->broj_indeksa}} <hr>
          Broj izlazaka: {{$brojac}} <hr>
          </p>
          <button type="submit" class="btn btn-lg btn-block btn-outline-success">Potvrdi</button>
        @endif
        @endforeach
       
        </form>
        </div>
        </div>
    </div>
</div>
@endif
<br>
<hr>
<br>
<div class = "row">
    <div class="col-md-3">
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4"  style="text-align: right;">
             <a href="{{route('ispiti.rokovi')}}" class="btn btn-outline-danger">Natrag</a>
     </div>
   
</div>
@endsection