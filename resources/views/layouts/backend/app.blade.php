<!DOCTYPE html>
<html lang="en" class="w-100 min-vh-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titel')</title>
    <link href="/css/app.css" rel="stylesheet">
    <style>
        .menu-icon {
            width: 30px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }
    </style>
</head>
<body class="w-100 min-vh-100">
    <div class="d-flex w-100 min-vh-100">
        
        @include('layouts.backend.sidebar')
        <div class="d-flex flex-column w-100 min-vh-100">
            
            @include('layouts.backend.nav')
            <main class="d-flex flex-column w-100 min-vh-100 p-2">
                @yield('content')
            </main>
            <footer class="primary-background-color text-white text-center p-3">
                <p class="mt-2 mb-2">make with love by Team IO</p>
            </footer>
        </div>
    </div>
    <script src="/js/app.js" defer></script>
    @yield('scripts')
</body>
</html>