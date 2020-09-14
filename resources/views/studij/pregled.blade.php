@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div class = "row">
    <div class="col-md-1">
        <h2>Studiji </h2>
    </div>

    <div class="col-md-2" style="text-align: right">
        <a href="{{route('studij.dodaj') }}" class="btn btn-outline"> ➕</a>
    </div>
    <div class="col-md-9">
    </div>
</div>
<hr>
<form action="{{ route('studij.pretraga') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretraživanje" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
<br>
    <div class="col-md-12">
        <table class="table table-responsive table-bordered table-hover">
         <tr>
            <th>Naziv</th>
            <th>Opis</th>
            <th>Akcije</th>
        </tr>

        @foreach($studij as $studiji)
            <tr>
                <td>{{$studiji->naziv}}</td>
                <td>{{$studiji->opis}}</td>
                <td> <a href = "{{route('studij.uredi', $studiji->id)}}" > Uredi </a> | <a href ="{{ route ('studij.izbrisi', $studiji->id)}}"> Obriši </a> </td>
            </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>

@endsection