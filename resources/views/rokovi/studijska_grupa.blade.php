@extends('ispiti.okvir')

@section('sadrzaj')
<style> ul li{
  display: inline;
}
 </style>
<div class = "row">
    <div class="col-md-10">
        <h2>Ispitni rokovi za studijsku grupu {{$grupa->naziv}} </h2s>
    </div>

    <div class="col-md-2"  style="text-align: right;"> 
        <a href="{{ route('rokovi.pregled')}}" style="font-family: 'Montserrat';" class="btn btn-outline-danger">Natrag</a>
    </div>
    <div class="col-md-7">
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
        @endforeach
        </table>
        <br>
    @endif
    @if($zimski2->isNotEmpty())
    <h5>Drugi zimski ispitni rok </h5>
    <hr>
        <table class="table table-borderedtable-responsive table-hover">
         <tr>
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>Studijska grupa</th>
            <th>Vrijeme održavanja</th>
            <th>Prijave do</th>
            <th>Akcije</th>
        </tr>

        @foreach($zimski2 as $z2)
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
        @endforeach
        </table>
        <br>
    @endif

    @if($ljetni1->isNotEmpty())
    <h5>Prvi ljetni ispitni rok </h5>
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

        @foreach($ljetni1 as $l1)
            <tr>
                <td>{{$l1->ime}}</td>
                <td>{{$l1->name}}</td>
                <td>{{$l1->naziv}}</td>
                <td>{{$l1->vrijeme_odrzavanja}}</td>
                <td>{{$l1->prijava_do}}</td>
                <td>
                <a href = "{{route ('rokovi.uredi', $l1->id_ispita)}}" > Uredi </a> | 
                <a href ="{{ route ('rokovi.izbrisi', $l1->id_ispita)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @endif
    @if($ljetni2->isNotEmpty())
    <h5>Drugi ljetni ispitni rok </h5>
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

        @foreach($ljetni2 as $l2)
            <tr>
                <td>{{$l2->ime}}</td>
                <td>{{$l2->name}}</td>
                <td>{{$l2->naziv}}</td>
                <td>{{$l2->vrijeme_odrzavanja}}</td>
                <td>{{$l2->prijava_do}}</td>
                <td>
                <a href = "{{route ('rokovi.uredi', $l2->id_ispita)}}" > Uredi </a> | 
                <a href ="{{ route ('rokovi.izbrisi', $l2->id_ispita)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @endif
    @if($jesenski1->isNotEmpty())
    <h5>Prvi jesenski ispitni rok </h5>
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

        @foreach($jesenski1 as $j1)
            <tr>
                <td>{{$j1->ime}}</td>
                <td>{{$j1->name}}</td>
                <td>{{$j1->naziv}}</td>
                <td>{{$j1->vrijeme_odrzavanja}}</td>
                <td>{{$j1->prijava_do}}</td>
                <td>
                <a href = "{{route ('rokovi.uredi', $j1->id_ispita)}}" > Uredi </a> | 
                <a href ="{{ route ('rokovi.izbrisi', $j1->id_ispita)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @endif
    @if($jesenski2->isNotEmpty())
    <h5>Drugi jesenski ispitni rok </h5>
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

        @foreach($jesenski2 as $j2)
            <tr>
                <td>{{$j2->ime}}</td>
                <td>{{$j2->name}}</td>
                <td>{{$j2->naziv}}</td>
                <td>{{$j2->vrijeme_odrzavanja}}</td>
                <td>{{$j2->prijava_do}}</td>
                <td>
                <a href = "{{route ('rokovi.uredi', $j2->id_ispita)}}" > Uredi </a> | 
                <a href ="{{ route ('rokovi.izbrisi', $j2->id_ispita)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @endif
    @if($dekanski->isNotEmpty())
    <h5>Dekanski ispitni rok </h5>
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

        @foreach($dekanski as $d)
            <tr>
                <td>{{$d->ime}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->naziv}}</td>
                <td>{{$d->vrijeme_odrzavanja}}</td>
                <td>{{$d->prijava_do}}</td>
                <td>
                <a href = "{{route ('rokovi.uredi', $d->id_ispita)}}" > Uredi </a> | 
                <a href ="{{ route ('rokovi.izbrisi', $d->id_ispita)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @endif
        
        <br>
        <hr>
    </div>
</div>


@endsection