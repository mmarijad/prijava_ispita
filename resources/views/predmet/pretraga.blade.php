@extends('ispiti.okvir')

@section('sadrzaj')

            <div class="col-md-12">
                
                   
                        <div class="row">
                            <div class="col-md-5">
                                <h3 style="margin-top: 5px;">Rezultati pretraživanja</h3>
                                <hr>
                            </div>
                           
                            <div class="col-md-2"  style="text-align: right;">
                            <a href="{{route('predmet.pregled')}}" class="btn btn-outline-dark btn-sm">Natrag</a>
                            </div>
                            <div class="col-md-5"> </div>
                </div>
                <br/>
            </div>

@if($predmeti->isNotEmpty())
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

        @foreach($predmeti as $predmet)
            <tr>
                <td>{{$predmet->ime}}</td>
                <td>{{$predmet->ECTS}}</td>
                <td>{{$predmet->name}}</td>
                <td>{{$predmet->naziv}}</td>
                <td> 
                <a href = "{{route('predmet.uredi', $predmet->predmet_id)}}" > Uredi </a> | 
                <a href ="{{ route ('predmet.izbrisi', $predmet->predmet_id)}}"> Obriši </a>  
                </td>
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