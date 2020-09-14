@extends('ispiti.okvir')

@section('sadrzaj')

            <div class="col-md-12">
                
                   
                        <div class="row">
                            <div class="col-md-5">
                                <h3 style="margin-top: 5px;">Rezultati pretraživanja</h3>
                                <hr>
                            </div>
                           
                            <div class="col-md-2"  style="text-align: right;">
                            <a href="{{route('nastavnici.pregled')}}" class="btn btn-outline-dark btn-sm">Natrag</a>
                            </div>
                            <div class="col-md-5"> </div>
                </div>
                <br/>
            </div>

@if($nastavnici->isNotEmpty())
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
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