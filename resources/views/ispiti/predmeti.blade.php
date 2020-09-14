@extends('ispiti.okvir')

@section('sadrzaj')
<br>
<div id="djelheaderWrapper">
<h2 style="font-size:50%; color: white; text-shadow: 3px 3px 6px #000000; margin-top:65px; "> Upisani predmeti </h2>
</div>
<br>
@if($predmet->isNotEmpty())
<br>
<div class = "row">
    <div class="col-md-12">
        <table class="table table-hover">

        @foreach($predmet as $predmeti)
            <tr class="data_row">
                <td style="text-align:center;" class="ime">{{$predmeti->ime}}</td>
                <td>
                <button type="button" class="btn btn-block btn-outline-info" id="edit-item" data-item-id="{{$predmeti->id_predmeta}}" data-item-name="{{$predmeti->ime}}" data-item-ects="{{$predmeti->ECTS}}" data-item-semestar="{{$predmeti->naziv_semestra}}">Detalji</button>
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
                            <label class="col-form-label" for="modal-input-name">Naziv kolegija</label>
                            <input type="text" name="modal-input-name" class="form-control" id="modal-input-name" required>
                        </div>
                        <!-- /name -->
                        <!-- ects -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-ects">ECTS bodovi</label>
                            <input type="text" name="modal-input-ects" class="form-control" id="modal-input-ects" required>
                        </div>
                        <!-- /ects -->
                        <!-- semestar -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-semestar">Semestar predmeta</label>
                            <input type="text" name="modal-input-semestar" class="form-control" id="modal-input-semestar" required>
                        </div>
                        <!-- /semestar -->
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">Zatvori</button>
                </div>
                </div>
            </div>
            </div>
@endforeach
</table>
        <br>
    </div>
</div>
@else 
    <hr>
    <br>
    <div>
    <h5 style=" text-align: center;">Nema upisanih predmeta</h5>
    </div>
    <br>
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

    // get the data
    var id = el.data('item-id');
    var ime = el.data('item-name');
    var ects = el.data('item-ects');
    var semestar = el.data('item-semestar');

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(ime);
    $("#modal-input-ects").val(ects);
    $("#modal-input-semestar").val(semestar);

  })

  // on modal hide
  $('#edit-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})

</script>
@endsection