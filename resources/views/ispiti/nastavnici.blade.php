@extends('ispiti.okvir')

@section('sadrzaj')

<br>
<div id="djelheaderWrapper">
<h2 style="font-size:50%; color: white; margin-top:65px; "> Nastavnici </h2>
</div>
<br>
<hr>
<form action="{{ route('ispiti.nastavnici_pretraga') }}" method="GET">
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
        <table class="table table-hover table-bordered">
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
    </div>
</div>


@endsection