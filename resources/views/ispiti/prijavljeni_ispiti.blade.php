@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div id="djelheaderWrapper">
<h2 style="font-size:50%; color: white; text-shadow: 3px 3px 6px #000000; margin-top:65px; "> Prijavljeni ispiti </h2>
</div>
<br><hr><br>
<div class = "row">
    <div class="col-md-12">
    @if($zimski1->isNotEmpty())
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Predmet</th>
            <th>ECTS</th>
            <th>Vrijeme održavanja</th>
            <th>Prijave do</th>
            <th></th>
        </tr>

        @foreach($zimski1 as $z1)
            <tr>
                <td>{{$z1->ime}}</td>
                <td>{{$z1->ECTS}}</td>
                <td>{{$z1->vrijeme_odrzavanja}}</td>
                <td>{{$z1->prijava_do}}</td>
                <td>
                <a href = " {{ route ('ispiti.odjavi', $z1->prijava_id )}}" > Odjava ispita </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
    @else<h5 style="text-align: center;">Nemate prijavljenih ispita</h5>
    @endif
        <hr>
    </div>
</div>


@endsection