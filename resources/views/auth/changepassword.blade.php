@extends('layouts.app')
<style>
            html, body {
                background: url('https://cdn.hipwallpaper.com/i/36/82/akl5Gg.jpg');
                background-repeat: no-repeat;
                background-size: auto;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .links > a {
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
        
@section('content')
<br> <br>
<div  class="container">
    <div class="row justify-content-center">
    <div class="row">
   
    <div class="col-md-3"></div>
        <div class="col-md-8 col-md-offset-2">
        <div class="card" style=" background: rgba(247, 242, 242,.2);">
        <div style="background: rgba(130,130,130,.1); text-align:center; font-size: 20px;" class="card-header">{{ __('Promjena lozinke') }}</div>
             <br>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Trenutna lozinka</label>

                            <div class="col-md-12">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Nova lozinka</label>

                            <div class="col-md-12">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Potvrdite novu lozinku</label>

                            <div class="col-md-12">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-light btn-block">
                                   Promijeni lozinku
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
