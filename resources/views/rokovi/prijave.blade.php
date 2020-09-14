@extends('ispiti.okvir')

@section('sadrzaj')
<style> ul li{
  display: inline; }

  td{
    white-space: nowrap;
}
 </style>
 <br>
<div class = "row">
    <div class="col-md-5">
        <h2>Ispiti - prijave </h2>
    </div>
    <div class="col-md-7">
    </div>
</div>

<hr>
<form action="{{ route('rokovi.pretrazi_prijave') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretražite predmete" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
@if($prijave->isNotEmpty())
<br>
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
            <th>Predmet</th>
            <th>Student - ime</th>
            <th>Student - broj indeksa</th>
            <th>Studijska grupa</th>
            <th>Vrijeme održavanja ispita</th>
            <th>Vrijeme prijave</th>
            
            @foreach($prijave as $p)
                <tr>
                    <td>{{$p->ime}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->broj_indeksa}}</td>
                    <td>{{$p->naziv}}</td>
                    <td>{{$p->vrijeme_odrzavanja}}</td>
                    <td>{{$p->vrijeme_prijave}}</td>
                 </tr>
            @endforeach     
      </div>
</table>
 </div>
</div>
<br><hr><br>
@else <h5 style="text-align: center">Nema novih prijava. </h5><hr>
@endif

@endsection