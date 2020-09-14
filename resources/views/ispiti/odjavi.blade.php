@extends('ispiti.okvir')

@section('sadrzaj')

<hr>
<div class = "row">
<div class="col-md-1"> </div>
    <div class="col-md-10">
    <div class="card">
    <div class="card-body">

    <form action="{{ route('ispiti.odjavi', $prijava->id)}}" method="POST">
    @csrf <!-- Svaka forma mora imati CSRF token! -->
    <h5> Odjava ispita iz predmeta {{$predmet->ime}}</h5>
        <hr>
        <br>
        @if  ($prijava->count() == 0)
            <h5>Ovaj ispit nije prijavljen!</h5>
        @elseif ( $vrijeme < $sad )
            <h5> Istekao rok odjave! </h5>
        @else 
          <p> 
          Vrijeme odrzavanja: {{$ispit->vrijeme_odrzavanja}} <hr>
          Prijava do: {{$ispit->prijava_do}} <hr>
          Odjava do: {{$ispit->odjava_do}} <hr>
          Student: {{$student->name}} <hr>
          Broj indeksa: {{$student->broj_indeksa}} <hr>
          Broj izlazaka: {{$brojac}}<hr>
          </p>
          <button type="submit" class="btn btn-lg btn-block btn-outline-success">Potvrdi</button>
        @endif
       
        </form>
        </div>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<div class = "row">
    <div class="col-md-3">
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4"  style="text-align: right;">
             <a href="{{ route('ispiti.prijavljeni_ispiti')}}" class="btn btn-outline-danger">Natrag</a>
     </div>
   
</div>
@endsection