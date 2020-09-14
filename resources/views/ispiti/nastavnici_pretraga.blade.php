@extends('ispiti.okvir')

@section('sadrzaj')

<br>
<div class="col-md-12">
    <div id="djelheaderWrapper">
        <div class="row">
            <div class="col-md-9">
                <h2 style="font-size:50%; color: white; margin-top:65px; "> Rezultati pretraživanja </h2>
            </div>
                            
            <div class="col-md-2"  style="text-align: right;">
                <a href="{{route('ispiti.nastavnici')}}" style="margin-top:60px; " class="btn btn-outline-light">Natrag</a>
            </div>
           
        </div>
    </div>
</div>
<br><hr><br>

@if($nastavnici->isNotEmpty())
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover table-responsive">
         <tr>
            <th>Ime</th>
            <th>E-mail</th>
        </tr>

        @foreach($nastavnici as $nastavnik)
            <tr>
                <td>{{$nastavnik->name}}</td>
                <td>{{$nastavnik->email}}</td>
             </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>
@else 
    <div>
    <h5>Nema rezultata za Vaše pretraživanje</h5>
    </div>
@endif

@endsection