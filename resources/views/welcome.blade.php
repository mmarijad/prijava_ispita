<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">


        <!-- Styles -->
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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
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

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{route('ispiti.rokovi') }}">Naslovnica</a>
                    @else
                        <a href="{{ route('login') }}">🔒 Prijava</a>
                    @endauth
                </div>
            @endif

            <div class="card" style="background: rgba(247, 242, 242,.4); height: 400px;  width: 700px;">
                <div class="card-body">
                <div class="title m-b-md" style="color: #5c5454; margin-top: 50px; text-align: center;">
                    Ispitni rokovi <br> FPMOZ
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
