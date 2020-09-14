@extends('ispiti.okvir')

@section('sadrzaj')

<style>
  td{
    white-space: nowrap;
}
</style>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-5">
            <h3 style="margin-top: 5px;">Rezultati pretraživanja</h3>
            <hr>
            </div>
                           
            <div class="col-md-2"  style="text-align: right;">
                <a href="{{route('studenti.pregled')}}" class="btn btn-outline-dark btn-sm">Natrag</a>
            </div>
            
            <div class="col-md-5"> </div>
        </div>
    <br/>
</div>

@if($studenti->isNotEmpty())
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Ime</th>
            <th>Broj indeksa</th>
            <th>E-mail</th>
            <th>Studij</th>
            <th>Semestar</th>
            <th>Akcije</th>
        </tr>

        @foreach($studenti as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->broj_indeksa}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->naziv}}</td>
                <td>{{$student->naziv_semestra}}</td>
                <td> <a href = "{{route('studenti.uredi', $student->id)}}" > Uredi </a> | <a href ="{{ route ('studenti.izbrisi', $student->id)}}"> Obriši </a> </td>
            </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>
@else 
    <div>
    <h2>Nema rezultata za Vaše pretraživanje</h2>
    </div>
@endif

@endsection