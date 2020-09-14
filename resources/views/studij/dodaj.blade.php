
@extends('ispiti.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Novi studij</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('studij.pregled')}}" class="btn btn-outline-danger">Natrag</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">

                            <form action="{{ route('studij.spremi')}}" method="POST">
                                @csrf <!-- Svaka forma mora imati CSRF token! -->

                                <div class="form-group">
                                    <label for="naziv">Naziv *</label>
                                    <input name="naziv" type="text" class="form-control" placeholder="Unesite naziv...*" >
                                </div>
                                <div class="form-group">
                                    <label for="opis">Opis *</label>
                                    <textarea class="form-control" name="opis" rows="5" placeholder="Unesite opis...*"></textarea>
                                </div>

                                <button type="submit" class="btn btn-outline-primary">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
