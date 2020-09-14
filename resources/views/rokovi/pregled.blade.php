@extends('ispiti.okvir')

@section('sadrzaj')
<style> ul li{
  display: inline;
}
 </style>
 <br>
<div class = "row">
    <div class="col-md-4">
        <h2>Ispitni rokovi </h2s>
    </div>

    <div class="col-md-1" style="text-align: right">
        <a href="{{route('rokovi.dodaj') }}" class="btn btn-outline"> ➕</a>
    </div>
    <div class="col-md-7">
    </div>
</div>

<hr>
<form action="{{ route('rokovi.pretraga') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretraživanje" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
    <ul>
        @foreach($studij as $studiji)
        <li>
            <a href="{{route('rokovi.studijska_grupa', $studiji->id)}}">{{$studiji->naziv}}</a>
        </li>
        @endforeach
    </ul>
    <hr>
<div class = "row">
    <div class="col-md-12">
    <br><br>
    @if($zimski1->isNotEmpty())

        <h5>Prvi zimski ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            <tr>
                <th>Predmet</th>
                <th>Nastavnik</th>
                <th>Studijska grupa</th>
                <th>Vrijeme održavanja</th>
                <th>Prijave do</th>
                <th>Akcije</th>
            </tr>

            @foreach($zimski1 as $z1)
                @if($z1->sezona_id == 1)
                    <tr>
                        <td>{{$z1->ime}}</td>
                        <td>{{$z1->name}}</td>
                        <td>{{$z1->naziv}}</td>
                        <td>{{$z1->vrijeme_odrzavanja}}</td>
                        <td>{{$z1->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z1->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z1->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br>

        <h5>Drugi zimski ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            @foreach($zimski1 as $z2)
                @if($z2->sezona_id == 2)
                    <tr>
                        <td>{{$z2->ime}}</td>
                        <td>{{$z2->name}}</td>
                        <td>{{$z2->naziv}}</td>
                        <td>{{$z2->vrijeme_odrzavanja}}</td>
                        <td>{{$z2->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z2->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z2->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br>  

        <h5>Prvi ljetni ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            @foreach($zimski1 as $z3)
                @if($z3->sezona_id == 3)
                    <tr>
                        <td>{{$z3->ime}}</td>
                        <td>{{$z3->name}}</td>
                        <td>{{$z3->naziv}}</td>
                        <td>{{$z3->vrijeme_odrzavanja}}</td>
                        <td>{{$z3->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z3->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z3->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br>        

        <h5>Drugi ljetni ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            @foreach($zimski1 as $z4)
                @if($z4->sezona_id == 4)
                    <tr>
                        <td>{{$z4->ime}}</td>
                        <td>{{$z4->name}}</td>
                        <td>{{$z4->naziv}}</td>
                        <td>{{$z4->vrijeme_odrzavanja}}</td>
                        <td>{{$z4->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z4->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z4->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br>  

        <h5>Prvi jesenski ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            @foreach($zimski1 as $z5)
                @if($z5->sezona_id == 5)
                    <tr>
                        <td>{{$z5->ime}}</td>
                        <td>{{$z5->name}}</td>
                        <td>{{$z5->naziv}}</td>
                        <td>{{$z5->vrijeme_odrzavanja}}</td>
                        <td>{{$z5->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z5->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z5->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br>                  

        <h5>Drugi jesenski ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            @foreach($zimski1 as $z6)
                @if($z6->sezona_id == 6)
                    <tr>
                        <td>{{$z6->ime}}</td>
                        <td>{{$z6->name}}</td>
                        <td>{{$z6->naziv}}</td>
                        <td>{{$z6->vrijeme_odrzavanja}}</td>
                        <td>{{$z6->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z6->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z6->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br> 

        <h5>Dekanski ispitni rok </h5>
        <hr>
            <table class="table table-bordered table-responsive table-hover">
            @foreach($zimski1 as $z7)
                @if($z7->sezona_id == 7)
                    <tr>
                        <td>{{$z7->ime}}</td>
                        <td>{{$z7->name}}</td>
                        <td>{{$z7->naziv}}</td>
                        <td>{{$z7->vrijeme_odrzavanja}}</td>
                        <td>{{$z7->prijava_do}}</td>
                        <td>
                        <a href = "{{route ('rokovi.uredi', $z7->id_ispita)}}" > Uredi </a> | 
                        <a href ="{{ route ('rokovi.izbrisi', $z7->id_ispita)}}"> Obriši </a>  
                        </td>
                    </tr>
                @endif
            @endforeach
            </table>
            <br>             
    @endif
        <br>
        <hr>
    </div>
</div>


@endsection