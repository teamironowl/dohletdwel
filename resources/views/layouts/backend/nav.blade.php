<nav class="navbar navbar-expand-md navbar-light primary-background-color shadow-sm">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('/logo.jpg')}}" alt="Logo" width="50px">
        </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto navbar-brand text-white">
                <span class="wrap-menu" onclick="$('.sidebar').toggleClass('open')">
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                </span>
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