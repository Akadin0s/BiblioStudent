@extends('layouts.appT', ['Nav' => true])

@section('content')
    <section>
        <div
            style="background-image: url('{{ asset('Items/homeimage.png') }}'); background-size: cover; background-position: center; background-attachment: scroll; height: 100vh; width: 100%;">
            <div class="container h-100 d-flex align-items-center justify-content-start"> <!-- Center vertically and align to the left -->
                <div class="row align-items-center"> <!-- Align items in the row -->
                    <!-- Text Content -->
                    <span>
                        <h1 style="color: #3A5A78;">Bienvenue,{{ Auth::user()->name }}</h1>
                    </span>
                    <div class="col-md-15"> <!-- Adjusted to 3/4 of the page width -->
                        <h1 class="display-4" style="color: black; width: 75%;">Meilleures plateformes numériques pour l'acquisition de <span
                                style=" color: #F4A261;">compétences</span> et <span style=" color: #F4A261;">la formation continue!</span></h1>
                        <p class="lead display-5" style="color: black;">Faites un pas vers vos <span style=" color: #F4A261;">rêves </span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
