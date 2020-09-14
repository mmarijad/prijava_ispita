@extends('ispiti.okvir')

@section('sadrzaj')
<style> ul li{
  display: inline;
}
 </style>
 <br>
<div class = "row">
    <div class="col-md-4">
        <h2>Ispiti - prijave </h2>
    </div>
</div>

<hr>
<form action="{{ route('rokovi.pretraga') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretražite predmete" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
<br>
@if($prijave->isNotEmpty())
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>Studijska grupa</th>
            <th>Vrijeme održavanja</th>
            <th>Vrijeme prijave</th>
            <th>Student - ime</th>
            <th>Student - broj indeksa</th>
            <th>Status</th>
            <th>Akcije</th>

            @foreach($prijave as $p)
                    <tr>
                        <td>{{$p->ime}}</td>
                        <td></td>
                        <td>{{$p->naziv}}</td>
                        <td>{{$p->vrijeme_odrzavanja}}</td>
                        <td>{{$p->vrijeme_prijave}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->broj_indeksa}}</td>
                        <td>{{$p->status}}</td>
                        <td>
                        <button 
                        type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#exampleModalCenter"> Launch demo modal
                        </button>
                        </td>
                    </tr>
            @endforeach
        </table>
    </div>
</div>
@else 
<h5>Nema rezultata za Vaše pretraživanje! </h5>
@endif
<br><hr><br>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection