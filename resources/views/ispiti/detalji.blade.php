@extends('ispiti.okvir')

@section('sadrzaj')

<br>
<div id="djelheaderWrapper">
    <div class = "row">
        <div class="col-md-7">
            <h2 style="font-size:50%; color: white; margin-top:65px;"> {{($studij->naziv)}}</h2>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
                <a href="{{route('ispiti.programi')}}" style="margin-top:60px;" class="btn btn-outline-light">Natrag</a>
        </div>
    </div>
</div>
<hr>

<p style="color: #636b6f; font-family: 'Nunito', sans-serif; font-weight: 200;">
    {{($studij->opis)}}
</p>
<hr>
<br>
<div class = "row">
    <div class="col-md-12">
        <h6 >Predmeti na prvoj godini preddiplomskog studija</h6>
        <br>
        <table class="table table-bordered table-hover table-responsive">
         <tr>
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>ECTS</th>
        </tr>

        @foreach($detalji1 as $detalj1)
            <tr>
                <td>{{$detalj1->ime}}</td>
                <td>{{$detalj1->name}}</td>
                <td>{{$detalj1->ECTS}}</td>
            </tr>
        @endforeach
        </table>
        <br><hr>
    </div>
</div>

<br>
<div class = "row">
    <div class="col-md-12">
        <h6>Predmeti na drugoj godini preddiplomskog studija</h6>
        <br>
        <table class="table table-bordered table-hover table-responsive">
         <tr>
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>ECTS</th>
        </tr>

        @foreach($detalji2 as $detalj2)
            <tr>
                <td>{{$detalj2->ime}}</td>
                <td>{{$detalj2->name}}</td>
                <td>{{$detalj2->ECTS}}</td>
            </tr>
        @endforeach
        </table>
        <br><hr>
    </div>
</div>
<br>
<div class = "row">
    <div class="col-md-12">
        <h6>Predmeti na trećoj godini preddiplomskog studija</h6>
        <br>
        <table class="table table-bordered table-hover table-responsive">
         <tr>
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>ECTS</th>
        </tr>

        @foreach($detalji3 as $detalj3)
            <tr>
                <td>{{$detalj3->ime}}</td>
                <td>{{$detalj3->name}}</td>
                <td>{{$detalj3->ECTS}}</td>
            </tr>
        @endforeach
        </table>
        <br><hr>
    </div>
</div>


@endsection