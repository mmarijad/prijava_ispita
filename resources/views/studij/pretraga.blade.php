@extends('ispiti.okvir')

@section('sadrzaj')

            <div class="col-md-12">
                
                   
                        <div class="row">
                            <div class="col-md-5">
                                <h3 style="margin-top: 5px;">Rezultati pretraživanja</h3>
                                <hr>
                            </div>
                           
                            <div class="col-md-2"  style="text-align: right;">
                            <a href="{{route('studij.pregled')}}" class="btn btn-outline-dark btn-sm">Natrag</a>
                            </div>
                            <div class="col-md-5"> </div>
                </div>
                <br/>
            </div>

@if($studiji->isNotEmpty())
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Naziv</th>
            <th>Opis</th>
            <th>Akcije</th>
        </tr>

        @foreach($studiji as $studij)
            <tr>
                <td>{{$studij->naziv}}</td>
                <td>{{$studij->opis}}</td>
                <td> <a href = "{{route('studij.uredi', $studij->id)}}" > Uredi </a> | <a href ="{{ route ('studij.izbrisi', $studij->id)}}"> Obriši </a> </td>
            </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>
@else 
    <div>
    <h3>Nema rezultata za Vaše pretraživanje</h3>
    </div>
@endif

@endsection