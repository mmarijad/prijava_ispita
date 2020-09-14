@extends('ispiti.okvir')

@section('sadrzaj')

<style>
  td{
    white-space: nowrap;
}
</style>

<br>
<div class = "row">
    <div class="col-md-1">
        <h2> Studenti </h2>
    </div>

    <div class="col-md-2" style="text-align: right">
        <a href="{{route('studenti.dodaj') }}" class="btn btn-outline"> ➕</a>
    </div>
    <div class="col-md-9">
    </div>
</div>
<hr>
<form action="{{ route('studenti.pretraga') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretraživanje" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
<br>
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Ime i prezime</th>
            <th>Broj indeksa</th>
            <th>E-mail</th>
            <th>Studij</th>
            <th>Semestar</th>
            <th>Akcije</th>
        </tr>

        @foreach($studenti as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td> {{$student->broj_indeksa}} </td>
                <td>{{$student->email}}</td>
                <td>{{$student->studij}}</td>
                <td>{{$student->semestar}}</td>

                <td> <a href = "{{route('studenti.uredi', $student->student_id)}}" > Uredi </a> | <a href ="{{ route ('studenti.izbrisi', $student->student_id)}}"> Obriši </a> </td>
            </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>


@endsection