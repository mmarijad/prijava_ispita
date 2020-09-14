@extends('ispiti.okvir')

@section('sadrzaj')
<style> ul li{
  display: inline;
}
 </style>
 <br>
<div class = "row">
    <div class="col-md-10">
        <h2>Ispitni rokovi </h2s>
    </div>
    <div class="col-md-2"  style="text-align: right;"> 
        <a href="{{ route('rokovi.pregled')}}" style="font-family: 'Montserrat';" class="btn btn-outline-danger">Natrag</a>
    </div>
    <hr>
    <br>
<div class = "row">
    <div class="col-md-12">
    <br><br>
    @if($rokovi->isNotEmpty())
    <hr>
        <table class="table table-bordered table-responsive table-hover">
         <tr>
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>Studijska grupa</th>
            <th>Vrijeme održavanja</th>
            <th>Prijave do</th>
            <th>Sezona</th>
            <th>Akcije</th>
        </tr>

        @foreach($rokovi as $z1)
            <tr>
                <td>{{$z1->ime}}</td>
                <td>{{$z1->name}}</td>
                <td>{{$z1->naziv}}</td>
                <td>{{$z1->vrijeme_odrzavanja}}</td>
                <td>{{$z1->prijava_do}}</td>
                <td>{{$z1->sezona}}</td>
                <td>
                <a href = "{{route ('rokovi.uredi', $z1->id_ispita)}}" > Uredi </a> | 
                <a href ="{{ route ('rokovi.izbrisi', $z1->id_ispita)}}"> Obriši </a>  
                </td>
            </tr>
        @endforeach
        </table>
        <br>
        <br>
        @endif
        <hr>
    </div>
</div>


@endsection