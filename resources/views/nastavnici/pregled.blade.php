@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div class = "row">
    <div class="col-md-2">
        <h2>Nastavnici </h2>
    </div>

    <div class="col-md-2" style="text-align: right">
        <a href="{{route('nastavnici.dodaj') }}" class="btn btn-outline"> ➕</a>
    </div>
    <div class="col-md-8">
    </div>
</div>
<hr>
<form action="{{ route('nastavnici.pretraga') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretraživanje" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>

<div class = "row">
    <div class="col-md-12">
        <table class="table table-responsive table-hover table-bordered">
         <tr>
            <th>Ime</th>
            <th>E-mail</th>
            <th>Akcije</th>
        </tr>

        @foreach($nastavnici as $nastavnik)
            <tr>
                <td>{{$nastavnik->name}}</td>
                <td>{{$nastavnik->email}}</td>

                <td> <a href = "{{route('nastavnici.uredi', $nastavnik->id)}}" > Uredi </a> | <a href ="{{ route ('nastavnici.izbrisi', $nastavnik->id)}}"> Obriši </a> </td>
            </tr>
        @endforeach
        </table>
    </div>
</div>


@endsection