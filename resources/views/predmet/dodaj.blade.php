
@extends('ispiti.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Novi predmet</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('predmet.pregled')}}" class="btn btn-outline-danger">Natrag</a>
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

                            <form action="{{ route('predmet.spremi')}}" method="POST">
                                @csrf <!-- Svaka forma mora imati CSRF token! -->

                                <div class="form-group">
                                    <label for="ime">Naziv *</label>
                                    <input name="ime" type="text" class="form-control" placeholder="Unesite naziv...*" required>
                                </div>
                                <div class="form-group">
                                    <label for="ECTS">ECTS*</label>
                                    <input name="ECTS" type="text" class="form-control" placeholder="Unesite ECTS...*" required>
                                </div>
                                

                                <div class="form-group">
                                    <label for="studij_id">Studij *</label>
                                    <select class="form-control" name="studij_id">
                                        @foreach ($studiji as $studij)
                                            <option value="{{ $studij->id }}">{{ $studij->naziv }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="semestar_id">Semestar *</label>
                                    <select class="form-control" name="semestar_id">
                                        @foreach ($semestri as $semestar)
                                            <option value="{{ $semestar->id }}">{{ $semestar->naziv_semestra }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nastavnik_id">Nastavnik *</label>
                                    <select class="form-control" name="nastavnik_id">
                                        @foreach ($nastavnici as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn btn-outline-primary">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
