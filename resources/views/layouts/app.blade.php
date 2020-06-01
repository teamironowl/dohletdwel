<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DoHletDwel') }}</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light primary-background-color shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/logo.jpg')}}" alt="Logo" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto navbar-brand text-white">
                        <li>တို့လက်တွဲ | @yield('title')</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('volunteers') }}">{{ __('စေတနာ့၀န်ထမ်းများ') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('map') }}">{{ __('မြေပုံ') }}</a>
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

        <main>
            @yield('content')
        </main>
    </div>
    <footer class="primary-background-color text-white text-center p-4">
        <p class="mt-2 mb-2">make with love by Team IO</p>
    </footer>
    @guest
        @include('layouts._login')
        @include('layouts._register')
    @endguest
        @include('layouts._report_form')
        @include('layouts._volunteer_form')
        
    @yield('scripts')
</body>
</html>
