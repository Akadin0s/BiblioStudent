
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BiblioStudent') }}</title>

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
    @include('components.head.tinymce-config') <!-- Include TinyMCE configuration -->
</head>
<body>
    <div id="app">
        @if ($Nav == true)
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand with logo -->
            <a class="navbar-brand d-flex align-items-center fs-2" >
                <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="70" height="60" class="me-2">
                BiblioStudent
            </a>
    
            <!-- Toggler button for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible menu -->
            <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarNav" style="margin-left: -12%;">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link fs-3 animated-underline {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">{{ __('Home')}}</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link fs-3 animated-underline {{ request()->routeIs('document') ? 'active' : '' }}" href="{{ route('document') }}">{{ __('Documents')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-3 animated-underline {{ request()->routeIs('upload') ? 'active' : '' }}" href="{{ route('upload') }}">{{ __('Upload')}}</a>
                    </li>
                </ul>
            </div>
            
            <!-- Right-side user icon -->
            <a class="navbar-brand" href="{{ route('profile') }}">
                <img src="{{ asset('Items/user.png') }}" alt="User" width="40" height="34" class="d-inline-block align-text-top" >
            </a>
        </div>
    </nav>
    @endif
        <main class="py-0"> <!-- Change py-5 to py-0 to remove padding -->
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
