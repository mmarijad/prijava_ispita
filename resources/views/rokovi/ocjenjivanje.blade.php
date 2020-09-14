@extends('ispiti.okvir')

@section('sadrzaj')
<style> ul li{
  display: inline; }

  td{
    white-space: nowrap;
}
 </style>

 <br>
<div class = "row">
    <div class="col-md-5">
        <h2>Ocjenjivanje </h2>
    </div>
    <div class="col-md-7">
    </div>
</div>

<hr>
<form action="{{ route('rokovi.pretrazi_prijave') }}" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Pretražite predmete" required/>
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">🔎</button>
        </span>
    </div>
</form>
<hr>
@if($ispiti->isNotEmpty())
<br>
<div class = "row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive table-hover">
            <th>Predmet</th>
            <th>Studijska grupa</th>
            <th>Vrijeme održavanja</th>
            <th>Vrijeme prijave</th>
            <th>Student - ime</th>
            <th>Student - broj indeksa</th>
            <th>Status</th>
            <th>Akcije</th>

            @foreach($ispiti as $i)
                    <tr class="data-row">
                        <td class="ime">{{$i->ime}}</td>
                        <td>{{$i->naziv}}</td>
                        <td>{{$i->vrijeme_odrzavanja}}</td>
                        <td>{{$i->vrijeme_prijave}}</td>
                        <td>{{$i->name}}</td>
                        <td>{{$i->broj_indeksa}}</td>
                        <td>{{$i->status}}</td>
                        <td>
                        <button type="button" class="btn btn-block btn-outline-info" id="edit-item" data-item-id="{{$i->pi}}" data-item-ime="{{$i->ime}}" data-item-studij="{{$i->naziv}}" data-item-vrijeme-odrzavanja="{{$i->vrijeme_odrzavanja}}" data-item-vrijeme-prijave="{{$i->vrijeme_prijave}}" data-item-student="{{$i->name}}" data-item-broj-indeksa="{{$i->broj_indeksa}}">
                        Ocijeni
                        </button>
                        </td>
                    </tr>

        <!-- Attachment Modal -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5>Detalji</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form id="edit-form" class="form-horizontal" method="POST" action="">
                    <div class="card text-black  mb-0">
                        <div class="card-body">
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-ime"><u>Naziv kolegija</u></label>
                            <input type="text" name="modal-input-ime" class="form-control" id="modal-input-ime" readonly>
                        </div>
                        <!-- /name -->
                             <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-studij"><u>Naziv studija</u></label>
                            <input type="text" name="modal-input-studij" class="form-control" id="modal-input-studij" readonly>
                        </div>
                        <!-- /name -->
                             <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-student"><u>Student - ime</u></label>
                            <input type="text" name="modal-input-student" class="form-control" id="modal-input-student" readonly>
                        </div>
                        <!-- /name -->
                             <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-broj-indeksa"><u>Student - broj indeksa</u></label>
                            <input type="text" name="modal-input-broj-indeksa" class="form-control" id="modal-input-broj-indeksa" readonly>
                        </div>
                        <!-- /name -->
                             <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-vrijeme-odrzavanja"><u>Vrijeme odrzavanja</u></label>
                            <input type="text" name="modal-input-vrijeme-odrzavanja" class="form-control" id="modal-input-vrijeme-odrzavanja" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-vrijeme-odrzavanja"><u>Vrijeme prijave</u></label>
                            <input type="text" name="modal-input-vrijeme-prijave" class="form-control" id="modal-input-vrijeme-prijave" readonly>
                        </div>
                        <!-- /name -->
                        </form>
                     <form action="{{ route('rokovi.polozeno', $i->pi) }}">
                        <label class="col-form-label" for="ocjena"><u>Ocjena</u></label>
                        <input type="text" name="ocjena" class="form-control" id="ocjena" required>                        
                       <br> <button type="submit" id="ocijeni" class="btn btn btn-outline-success">Spremi</button>
                     </form>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                <btn class="btn btn-outline-success btn" style="display:block; " id="polozeno" onclick="ocijeni();">Položeno</btn>
                
                <a href="{{ route('rokovi.nijepolagano', $i->pi) }}" style=" text-transform: none;" class="btn btn-outline-warning btn" style="display:block;" id="nijePolagano">Nije polagano</a>
                
                <a href="{{ route('rokovi.nijepolozeno', $i->pi) }}" style=" text-transform: none;" class="btn btn-outline-danger btn" style="display:block;" id="nijePolozeno">Nije položeno</a>
            
                <button onclick="odustani()" id="odustani" class="btn btn-outline-danger" style="display:none;">Odustani</button> 
                </div>
                </div>
            </div>
            </div>

            @endforeach
        </table>
    </div>
</div>
<br><hr><br>

@else <h5 style="text-align: center">Nema novih prijava. </h5>
<hr>
@endif

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<script>


$(document).ready(function() {

$(document).on('click', "#edit-item", function() {
  $(this).addClass('edit-item-trigger-clicked'); 

  var options = {
    'backdrop': 'static'
  };
  $('#edit-modal').modal(options)
})

// on modal show
$('#edit-modal').on('show.bs.modal', function() {
  var el = $(".edit-item-trigger-clicked"); 
  var row = el.closest(".data_row");

    jQuery('#ocijeni').css("display","none");
    jQuery('#odustani').css("display","none");
    jQuery('#ocjena').css("display","none");


  // get the data
  var id = el.data('item-id');
  var ime = el.data('item-ime');
  var student = el.data('item-student');
  var brojIndeksa = el.data('item-broj-indeksa');
  var vrijemeOdrzavanja = el.data('item-vrijeme-odrzavanja');
  var vrijemePrijave = el.data('item-vrijeme-prijave');
  var studij = el.data('item-studij');
  var status = el.data('item-status');
  // fill the data in the input fields
  $("#modal-input-ime").val(ime);
  $("#modal-input-studij").val(studij);
  $("#modal-input-student").val(student);
  $("#modal-input-broj-indeksa").val(brojIndeksa);
  $("#modal-input-vrijeme-odrzavanja").val(vrijemeOdrzavanja);
  $("#modal-input-vrijeme-prijave").val(vrijemePrijave);
  $("#modal-input-status").val(status);
})

$(document).on('click', "#polozeno", function(){
        jQuery('#ocijeni').css("display","block");
        jQuery('#odustani').css("display","block");
        jQuery('#ocjena').css("display","block");
        jQuery('#polozeno').css("display","none");
		jQuery('#nijePolagano').css("display","none");
		jQuery('#nijePolozeno').css("display","none");
})

$(document).on('click', "#odustani", function(){
        jQuery('#ocijeni').css("display","none");
        jQuery('#odustani').css("display","none");
        jQuery('#ocjena').css("display","none");
        jQuery('#polozeno').css("display","block");
		jQuery('#nijePolagano').css("display","block");
		jQuery('#nijePolozeno').css("display","block");
})


// on modal hide
$('#edit-modal').on('hide.bs.modal', function() {
  $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
  $("#edit-form").trigger("reset");
})

$('#edit-modal')
})
</script>

@endsection