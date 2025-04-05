<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <style>
        .navbar {
            transition: background-color 0.3s ease; /* Smooth transition for background color */
            background-color: transparent !important; /* Transparent background initially */
        }
        .navbar.scrolled {
            background-color: #F4F1E1 !important; /* Background color when scrolled */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top transparent navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center fs-2" href="#">
                    <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="70" height="60" class="me-2">
                    BiblioStudent
                  </a>
              <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item me-3"> <!-- Add margin-end -->
                    <a class="nav-link fs-3" aria-current="page" href="{{ route('Home') }}">Home</a>
                  </li>
                  <li class="nav-item me-3"> <!-- Add margin-end -->
                    <a class="nav-link fs-3" href="#">Cours</a>
                  </li>
                  <li class="nav-item"> <!-- No margin for the last item -->
                    <a class="nav-link fs-3" href="{{ route('contact') }}">Contact</a>
                  </li>
                </ul>
              </div>
              <a class="navbar-brand" href="#">
                <img src="{{ asset('Items/user.png') }}" alt="Logo" width="40" height="34" class="d-inline-block align-text-top">
              </a>
            </div>
        </nav>
        <main class="py-5">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > window.innerHeight) { // When scrolled past the window height
                navbar.classList.add('scrolled'); // Add background color
            } else {
                navbar.classList.remove('scrolled'); // Remove background color
            }
        });
    </script>
</body>
</html>
