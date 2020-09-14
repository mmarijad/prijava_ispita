@extends('ispiti.okvir')

@section('sadrzaj')

<br>
<div id="djelheaderWrapper">
<h2 style="font-size:50%; color: white; text-shadow: 3px 3px 6px #000000; margin-top:65px; "> Ocjene </h2>
</div>
<br>
<hr>
@if($predmet->isNotEmpty())
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Naziv</th>
            <th>ECTS</th>
            <th>Semestar predmeta</th>
            <th>Ocjena</th>
        </tr>

        @foreach($predmet as $predmeti)
            <tr>
                <td>{{$predmeti->ime}}</td>
                <td>{{$predmeti->ECTS}}</td>
                <td>{{$predmeti->naziv_semestra}}</td>
                <td>{{$predmeti->ocjena}}</td>
                </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>
@else 
    <br>
    <div>
    <h5 style=" text-align: center;">Nema upisanih ocjena</h5>
    </div>
    <br>
    <hr>
@endif


@endsection