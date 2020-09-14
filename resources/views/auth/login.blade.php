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
<hr>
<br>
<br>
<div  class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style=" background: rgba(247, 242, 242,.2);">
                <div style="background: rgba(130,130,130,.1);" class="card-header">{{ __('Prijava') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail adresa') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" style="background: rgba(247, 242, 242, .2);" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

                            <div class="col-md-6">
                                <input id="password" style="background: rgba(247, 242, 242,.2);" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Zapamti me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark">
                                    {{ __('Prijava') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link-dark" href="{{ route('password.request') }}">
                                        {{ __('Zaboravili ste lozinku?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<hr>
@endsection
