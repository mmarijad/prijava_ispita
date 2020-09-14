<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
</head>
<style>
  body { 
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    letter-spacing: .1rem;
  }  
  tr { 
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;"
  }            
 a {
     color: #636b6f;
     padding: 0 25px;
     font-size: 13px;
     font-weight: 600;
     letter-spacing: .1rem;
     text-decoration: none;
     text-transform: uppercase;
    }

 a:hover {
    color: #000;
    font-size: 18px;
            }
 </style>
<body>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="container">
            <div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <br>
                            <br>
                            <br>
                            <br>
                                <div class="col-md-1"></div>
                                
                                <div class="col-md-10">
                            
                                <h2 style="margin-top: 5px; font-family: 'Montserrat';">Novi ispitni rok</h2>
                                
                                </div>
                                <div class="col-md-1"  style="text-align: right;"> 
                                    <a href="{{ route('rokovi.pregled')}}" style="font-family: 'Montserrat';" class="btn btn-outline-danger">Natrag</a>
                            
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">

                            <form action="{{ route('rokovi.spremi')}}" method="POST">
                            <hr>
                               <br>
                                @csrf <!-- Svaka forma mora imati CSRF token! -->
                                <div class="form-group">
                                    <label for="predmet_id">Predmet *</label>
                                    <select class="form-control" name="predmet_id">
                                        @foreach ($predmeti as $predmet)
                                            <option value="{{ $predmet->id }}">{{ $predmet->ime }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="akademska_godina">Akademska godina*</label>
                                    <input name="akademska_godina" type="text" class="form-control" placeholder="Unesite akademsku godinu...*" required>
                                </div>

                                <div class="form-group">
                                    <label for="vrijeme_odrzavanja">Vrijeme održavanja *</label>
                                    <input type="text" class="form-control datetimepicker" name="vrijeme_odrzavanja" placeholder="Odaberite vrijeme održavanja...*" required> 
                                </div>

                                <div class="form-group">
                                    <label for="sezona_id">Sezona *</label>
                                    <select class="form-control" name="sezona_id" required>
                                        @foreach ($sezone as $sezona)
                                            <option value="{{ $sezona->id }}">{{ $sezona->sezona }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                               <hr>
                               <button type="submit" class="btn btn btn-outline-primary">Spremi</button>
                               <br>
                               <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
</div>
<script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker();
        });
    </script>
</body>
</html>