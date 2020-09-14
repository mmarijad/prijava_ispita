@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div id="djelheaderWrapper">
<h2 style="font-size:50%; color: white; text-shadow: 3px 3px 6px #000000; margin-top:65px; "> Studijski programi </h2>
</div>
<br><hr>
<form action="{{ route('studij.pretraga') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretraživanje" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
<br>
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover">
         <tr>
            <th>Naziv</th>
            <th></th>
        </tr>

        @foreach($studij as $studiji)
            <tr>
                <td>{{$studiji->naziv}}</td>
                <td> <a href = "{{ route('ispiti.detalji',  $studiji->id) }}" > Detalji </a> </td>
            </tr>
        @endforeach
        </table>
        <br>
        <hr>
    </div>
</div>


@endsection