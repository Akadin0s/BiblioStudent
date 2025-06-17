@extends('layouts.app', ['Nav' => true])

@section('content')
    <section class="mb-5">
        <div
            style="background-image: url('{{ asset('Items/homeimage.png') }}'); background-size: cover; background-position: center; background-attachment: scroll; height: 100vh; width: 100%;">
            <div class="container h-100 d-flex align-items-center ">
                <div class="row ">
                    <span>
                        <h1 style="color: #3A5A78;">Bienvenue, {{ Auth::user()->name }}</h1>
                    </span>
                    <div class="col-md-15"> <!-- Adjusted to 3/4 of the page width -->
                        <h1 class="display-4" style="color: black; width: 75%;">Meilleures plateformes numériques pour
                            l'acquisition de <span style=" color: #F4A261;">compétences</span> et <span style=" color: #F4A261;">la formation
                                continue!</span></h1>
                        <p class="lead display-5" style="color: black;">Faites un pas vers vos <span style=" color: #F4A261;">rêves </span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div>
            <div class="container position-relative center ">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h1 class="display-5" style="color: #3A5A78;">À propos de nous</h1>
                        <p class="lead fs-1" style="color: #A3BFD9;">Green Valley High School</p>
                        <p class="fs-3" style="color: #000000;">
                            Green Valley High School is a dynamic learning community dedicated to fostering academic
                            excellence, personal growth, and a passion for discovery. With a diverse range of programs
                            designed to challenge and inspire, we provide students with the tools they need to succeed both
                            in the classroom and beyond. Our committed faculty, state-of-the-art facilities, and vibrant
                            extracurricular activities create an environment where every student can thrive. Whether you're
                            focused on preparing for college, exploring your talents, or making lifelong friendships, Green
                            Valley High School is the place for you to grow and succeed.
                        </p>
                    </div>

                    <!-- Right Column: Image -->
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('Items/smallimage.png') }}" alt="About Us" class="img-fluid three-d" style="max-height: 400px;">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="mb-5">
        <div>
            <!-- Adjusted Side Panel -->
            <div class="side-pannel"
                style="position: fixed; top: 0; right: 0; height: 100%; width: 600px; background-color: #D6E4E1; opacity: 0.95; z-index: 1050; overflow-y: auto; padding: 20px; display: none;">
                <!-- Softer color -->
                <h4 style="color: black; margin-bottom: 20px;">All Cours</h4> <!-- Softer white -->
                <ul class="nav nav-tabs" style="margin-bottom: 20px;">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: black;" href="#">Programs</a> <!-- Softer white -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="#">Levels</a> <!-- Softer white -->
                    </li>

                </ul>
                <div class="row gx-3 gy-3">
                    @foreach ($languages as $language)
                        <div class="col-6">
                            <div class="card" style="background-color: #E0E0E0; border: none;">
                                <img src="{{ asset('storage/' . $language->image_path) }}" class="card-img-top">
                                <div class="card-body text-center">
                                    <p class="card-text" style="color: #495057;">{{ $language->name_language }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Side panel -->
            <div class="container position-relative center g-4">
                <div class="row align-items-center flex-wrap ">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <h1 class="display-5" style="color: #3A5A78;">Choisissez une matière</h1>
                        <p class="lead fs-2" style="color: #A3BFD9;"> Débutez Votre Apprentissage,</p>
                        <p class="lead fs-2" style="color: #A3BFD9; margin-top:-20px;">Une Opportunité Pour<span style="color: #F4A261;"> Chacun.</span>
                        </p>
                    </div>
                    <!-- Right Column -->
                    <div class="col-md-6 d-grid gap-2 d-flex justify-content-md-end mb-3">
                        <button id="side-pannel" class="btn btn-primary btn-lg">Voir plus</button>
                    </div>
                </div>
                <div class="row gx-4 gy-4 justify-content-center flex-wrap">
                    @foreach ($languages as $language)
                        <div class="col-auto zoom">
                            <a href="{{ route('languagecard', ['id' => $language->id]) }}" class="text-decoration-none">
                                <div class="card rounded-4 " style="width: 18rem;">
                                    <img src="{{ asset('storage/' . $language->image_path) }}" class="card-img-top img-fluid rounded-top-4"
                                        alt="Langue Française">
                                    <div class="card-body p-3">
                                        <h5 class="card-title" style="color: #3A5A78">{{ $language->title_language }}</h5>
                                        <p class="card-text">{{ $language->description_language }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection
