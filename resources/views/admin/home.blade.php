<!DOCTYPE html>
<html lang="en" class="w-100 h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="w-100 h-100">
    <div class="d-flex w-100 h-100">
        <div class="sidebar open">
            <div class="text-white">
                <botton class="toggle" class="btn btn-primary" onclick="$('.sidebar').toggleClass('open')">
                    &larr;
                </botton>
            </div>
            <ul class="list-group text-white bg-dark">
                <li class="list-group-item secondary-background-color">Cras justo odio</li>
                <li class="list-group-item secondary-background-color">Dapibus ac facilisis in</li>
                <li class="list-group-item secondary-background-color">Morbi leo risus</li>
                <li class="list-group-item secondary-background-color">Porta ac consectetur ac</li>
                <li class="list-group-item secondary-background-color">Vestibulum at eros</li>
            </ul>
        </div>

        <div class="d-flex flex-column w-100 h-100">
            <nav class="navbar navbar-expand-md navbar-light primary-background-color shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/logo.jpg')}}" alt="Logo" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto navbar-brand text-white">
                        <li>တို့လက်တွဲ | Admin Dashboard</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <span class="nav-link text-white" onclick="$('#loginForm').modal('show')" style="cursor:pointer">
                                    {{ __('လောဂ့်အင်') }}
                                </span>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <span class="nav-link text-white" onclick="$('#registerForm').modal('show')" style="cursor:pointer">{{ __('အကောင့်ဖွင့်ရန်') }}</span>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu secondary-background-color dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white" href="{{ route('home') }}">သင်၏စာမျက်နှာ</a>
                                    <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('လောဂ့်အောက်') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            </nav>

            <div class="d-flex flex-column w-100 h-100 p-2">
                <div class="row m-3">
                    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
                        <div class="card-header">Total Case</div>
                        <div class="card-body">
                            <p class="card-text">50</p>
                        </div>
                    </div>
                    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
                        <div class="card-header">Total Case</div>
                        <div class="card-body">
                            <p class="card-text">50</p>
                        </div>
                    </div>
                    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
                        <div class="card-header">Total Case</div>
                        <div class="card-body">
                            <p class="card-text">50</p>
                        </div>
                    </div>
                    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
                        <div class="card-header">Total Case</div>
                        <div class="card-body">
                            <p class="card-text">50</p>
                        </div>
                    </div>
                    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
                        <div class="card-header">Total Case</div>
                        <div class="card-body">
                            <p class="card-text">50</p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="primary-background-color text-white text-center p-3">
                <p class="mt-2 mb-2">make with love by Team IO</p>
            </footer>
        </div>
    </div>
    <script src="/js/app.js" defer></script>
</body>
</html>