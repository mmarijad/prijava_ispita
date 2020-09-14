
@extends('ispiti.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Novi nastavnik</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('nastavnici.pregled')}}" class="btn btn-outline-danger">Natrag</a>
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

                            <form action="{{ route('nastavnici.spremi')}}" method="POST">
                                @csrf <!-- Svaka forma mora imati CSRF token! -->

                                <div class="form-group">
                                    <label for="name">Ime i prezime *</label>
                                    <input name="name" type="text" class="form-control" placeholder="Unesite ime i prezime...*" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail*</label>
                                    <input name="email" type="text" class="form-control" placeholder="Unesite e-mail...*" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Lozinka*</label>
                                    <input name="password" type="text" class="form-control" placeholder="Unesite početnu lozinku...*" required>
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
