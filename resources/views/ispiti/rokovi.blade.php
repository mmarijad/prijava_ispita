@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div id="djelheaderWrapper">
<h2 style="font-size:50%; color: white; text-shadow: 3px 3px 6px #000000; margin-top:65px; "> Raspored ispita </h2>
</div>
<br><hr><br>
<div class = "row">
    <div class="col-md-12">
    <br>
    @if($zimski1->isNotEmpty())
    <h5>Prvi zimski ispitni rok </h5>
    <hr>
        <table class="table table-bordered table-responsivee table-hover">
         <tr>
            <th>Predmet</th>
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($zimski1 as $z1)
            <tr>
                <td>{{$z1->ime}}</td>
                <td>{{$z1->ECTS}}</td>
                <td>{{$z1->vrijeme_odrzavanja}}</td>
                <td>{{$z1->prijava_do}}</td>
                <td>{{$z1->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $z1->id_ispita )}}"> Prijavi </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @endif
   

    @if($zimski2->isNotEmpty())
    <h5>Drugi zimski ispitni rok </h5>
    <hr>
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Predmet</th>
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($zimski2 as $z2)
            <tr>
                <td>{{$z2->ime}}</td>
                <td>{{$z2->ECTS}}</td>
                <td>{{$z2->vrijeme_odrzavanja}}</td>
                <td>{{$z2->prijava_do}}</td>
                <td>{{$z2->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $z2->id_ispita )}}"> Prijavi </a></td>
            </tr>
      </div>
  </div>
</div>
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
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($ljetni1 as $l1)
            <tr>
                <td>{{$l1->ime}}</td>
                <td>{{$l1->ECTS}}</td>
                <td>{{$l1->vrijeme_odrzavanja}}</td>
                <td>{{$l1->prijava_do}}</td>
                <td>{{$l1->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $l1->id_ispita )}}"> Prijavi </a></td>
            </tr>
      </div>
  </div>
</div>
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
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($ljetni2 as $l2)
            <tr>
                <td>{{$l2->ime}}</td>
                <td>{{$l2->ECTS}}</td>
                <td>{{$l2->vrijeme_odrzavanja}}</td>
                <td>{{$l2->prijava_do}}</td>
                <td>{{$l2->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $l2->id_ispita )}}"> Prijavi </a></td>
            </tr>
      </div>
  </div>
</div>
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
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($jesenski1 as $j1)
            <tr>
                <td>{{$j1->ime}}</td>
                <td>{{$j1->ECTS}}</td>
                <td>{{$j1->vrijeme_odrzavanja}}</td>
                <td>{{$j1->prijava_do}}</td>
                <td>{{$j1->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $j1->id_ispita )}}"> Prijavi </a></td>
            </tr>
      </div>
  </div>
</div>
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
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($jesenski2 as $j2)
            <tr>
                <td>{{$j2->ime}}</td>
                <td>{{$j2->ECTS}}</td>
                <td>{{$j2->vrijeme_odrzavanja}}</td>
                <td>{{$j2->prijava_do}}</td>
                <td>{{$j2->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $j2->id_ispita )}}"> Prijavi </a></td>
            </tr>
      </div>
  </div>
</div>
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
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijava do</th>
            <th>Odjava do</th>
            <th>Akcije</th>
        </tr>

        @foreach($dekasnki as $d)
            <tr>
                <td>{{$d->ime}}</td>
                <td>{{$d->ECTS}}</td>
                <td>{{$d->vrijeme_odrzavanja}}</td>
                <td>{{$d->prijava_do}}</td>
                <td>{{$d->odjava_do}}</td>
                <td>
                <a href=" {{ route ('ispiti.prijavi', $d->id_ispita )}}"> Prijavi </a></td>
            </tr>
      </div>
  </div>
</div>
@endforeach
</table>
<br>
@endif
        <br>
        <hr>
    </div>
</div>
@endsection
