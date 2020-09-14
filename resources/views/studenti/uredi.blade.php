
@extends('ispiti.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Uredi</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('studenti.pregled')}}" class="btn btn-outline-danger">Natrag</a>
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

                            <form action="{{ route('studenti.uredi', $student->id)}}" method="POST">
                                @csrf <!-- Svaka forma mora imati CSRF token! -->

                                <div class="form-group">
                                    <label for="name">Ime i prezime*</label>
                                    <input name="name" type="text" class="form-control" placeholder="Unesite ime i prezime...*" value = "{{$student->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail*</label>
                                    <input name="email" type="text" class="form-control" placeholder="Unesite e-mail...*" value = "{{$student->email}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="broj_indeksa">Broj indeksa*</label>
                                    <input name="broj_indeksa" type="text" class="form-control" placeholder="Unesite broj indeksa...*" value = "{{$student->broj_indeksa}}">
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

                                <button type="submit" class="btn btn-outline-primary">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
