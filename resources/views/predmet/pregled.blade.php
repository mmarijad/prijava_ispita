@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div class = "row">
    <div class="col-md-1">
        <h2>Predmeti </h2s>
    </div>

    <div class="col-md-2" style="text-align: right">
        <a href="{{route('predmet.dodaj') }}" class="btn btn-outline"> ➕</a>
    </div>
    <div class="col-md-9">
    </div>
</div>

<hr>
<form action="{{ route('predmet.pretraga') }}" method="GET">
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
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Naziv</th>
            <th>ECTS</th>
            <th>Nastavnik</th>
            <th>Studij</th>
            <th>Akcije</th>
        </tr>

        @foreach($predmet as $predmeti)
            <tr>
                <td>{{$predmeti->ime}}</td>
                <td>{{$predmeti->ECTS}}</td>
                <td>{{$predmeti->name}}</td>
                <td>{{$predmeti->studij}}</td>
                <td> 
                <a href = "{{route('predmet.uredi', $predmeti->predmet_id)}}" > Uredi </a> | 
                <a href ="{{ route ('predmet.izbrisi', $predmeti->predmet_id)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>


@endsection