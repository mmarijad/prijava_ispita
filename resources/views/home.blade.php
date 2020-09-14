@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-md-3">
        <div class="card">
                <div class="card-body">
                <table class="table table-bordered table-hover table-condensed"> 
                    <thead class="card-header"> 
                        <th>ime</th> 
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table> 
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Naslovnica') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Uspješno ste se prijavili!') }}
                </div>
            </div>
            </br>
            <table class="table table-bordered table-hover table-condensed"> 
            <thead class="card-header"> 
            <th>ime</th> 
            <th>prezime</th> 
            <th>studij</th> 
            <th>godina</th> 
            </thead>
            <tbody>
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            </tr>
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            </tr>
            <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            </tr>
            </tbody>
            </table>
        </div>

        </div>
</div>
@endsection
