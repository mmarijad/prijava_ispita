
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ispitni rokovi - FPMOZ</title>
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
    font-size: 15px;
            }

  .current-link {
   background: rgba(153, 201, 167,.2);
}

#djelheaderWrapper{
	position: relative;
	padding:0;
	margin:0;
	overflow: hidden;
	height: 200px;
	background-image: url('https://cdn.hipwallpaper.com/i/36/82/akl5Gg.jpg');
	background-repeat: no-repeat;
	background-size: 100% 600px; 
	background-position: top center;
	background-attachment: fixed;
	text-align: center;
	color: white;
    text-shadow: 3px 3px 6px #000000;
	font-size: 500%;
}
  td{
    white-space: nowrap;
}
 </style>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: #e3f2fd;">
    <!-- Brand -->
    <a class="navbar-brand"  style="font-size: 15px;" href="{{route('ispiti.rokovi')}}">Ispitni rokovi</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('ispiti.nastavnici')}}">Nastavnici</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('ispiti.programi')}}">Studijski programi</a>
        </li>
                
        <!-- Dropdown -->
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjava') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('changePassword') }}">
                                        {{ __('Promjena lozinke') }}
                                    </a>
                                    
                                </div>
                                </li>
                        @endguest
                    </ul>
                </div>
</nav>

<div class="container" style="margin-top: 70px; ">
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
              @if (Auth::user()->vrsta == 'student')
                <li class="list-group-item"><a href="{{route('ispiti.predmeti')}}">Moji predmeti</a></li>
                <li class="list-group-item"><a href="{{route('ispiti.rokovi')}}">Raspored ispita</a></li>
                <li class="list-group-item"><a href="{{route('ispiti.prijavljeni_ispiti')}}">Prijavljeni ispiti</a></li>
                <li class="list-group-item"><a href="{{route('ispiti.ocjene')}}">Ocjene</a></li>
            
                @endif
                @if (Auth::user()->vrsta == 'admin')
                <li class="list-group-item"><a href="{{ route('studij.pregled') }}">Studiji</a></li>
                <li class="list-group-item"><a href="{{ route('nastavnici.pregled') }}">Nastavnici</a></li>
                <li class="list-group-item"><a href="{{ route('studenti.pregled') }}">Studenti</a></li>
                <li class="list-group-item"><a href="{{ route('predmet.pregled') }}">Predmeti</a></li>
                <li class="list-group-item"><a href="{{ route('rokovi.pregled') }}">Raspored ispita</a></li>
                <li class="list-group-item"><a href="{{ route('rokovi.prijave') }}">Prijave</a></li>
                <li class="list-group-item"><a href="{{ route('rokovi.ocjenjivanje') }}">Ocjenjivanje</a></li>
                @endif
            </ul>
        </div>
    <div class="col-sm-9">

           @yield('sadrzaj')

</div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
</body>

<script>
    currentLinks = document.querySelectorAll('a[href="'+document.URL+'"]')
    currentLinks.forEach(function(link) {
        link.className += ' current-link'
    });
</script>
</html>
