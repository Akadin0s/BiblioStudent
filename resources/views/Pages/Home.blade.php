{{-- filepath: c:\Users\akadinos\Desktop\Projet\BiblioStudent\resources\views\pages\landing.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="mb-5">
    <div style="background-image: url('{{ asset('Items/BackgroundImage.png') }}'); background-size: cover; background-position: center; background-attachment: scroll; height: 100vh; width: 100%; margin-top: -25px;">
        <div class="container h-100 d-flex align-items-center justify-content-start"> <!-- Center vertically and align to the left -->
            <div class="row align-items-center"> <!-- Align items in the row -->
                <!-- Text Content -->
                <div class="col-md-9"> <!-- Adjusted to 3/4 of the page width -->
                    <h1 class="display-5" style="color: black; width: 75%;">Meilleures plateformes numériques pour l'acquisition de <span style="font-size: 4rem; color: #F4A261;">compétences</span> et <span style="font-size: 4rem; color: #F4A261;">la formation continue!</span></h1>
                    <p class="lead fs-1" style="color: black;">Faites un pas vers vos <span style="font-size: 3rem; color: #F4A261;">rêves  </span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-5">
    <div  style="background-size: cover; background-position: center; background-attachment: scroll; height:auto; width: 100%; ">
        <div class="container position-relative center " >
            <div class="row align-items-center"> 
                <!-- Left Column: Text Content -->
                <div class="col-md-6" style="padding-right: 30px;"> 
                    <h1 class="display-4" style="color: #3A5A78;">About Us</h1>
                    <p class="lead fs-1" style="color: #A3BFD9;">Green Valley High School</p>
                    <p class="fs-3" style="color: #F4A261;">
                        Green Valley High School is a dynamic learning community dedicated to fostering academic excellence, personal growth, and a passion for discovery. With a diverse range of programs designed to challenge and inspire, we provide students with the tools they need to succeed both in the classroom and beyond. Our committed faculty, state-of-the-art facilities, and vibrant extracurricular activities create an environment where every student can thrive. Whether you're focused on preparing for college, exploring your talents, or making lifelong friendships, Green Valley High School is the place for you to grow and succeed.
                    </p>
                </div>

                <!-- Right Column: Image -->
                <div class="col-md-6 text-center" style="padding-left: 30px;"> 
                    <img src="{{ asset('Items/smallimage.png') }}" alt="About Us" class="img-fluid three-d" style="max-height: 500px;">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="#" class="btn btn-primary btn-lg">Learn More</a>
            </div>
            
        </div>
    </div>
</section>
<section class="mb-5">
    <div  style="background-size: cover; background-position: center; background-attachment: scroll; height: auto; width: 100%;">
        <!-- Adjusted Side Panel -->
        <div class="side-pannel" style="position: fixed; top: 0; right: 0; height: 100%; width: 600px; background-color: #D6E4E1; opacity: 0.95; z-index: 1050; overflow-y: auto; padding: 20px; display: none;"> <!-- Softer color -->
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
                <div class="col-6">
                    <div class="card" style="background-color: #E0E0E0; border: none;"> <!-- Softer gray -->
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top" alt="French">
                        <div class="card-body text-center">
                            <p class="card-text" style="color: #495057;">French</p> <!-- Softer dark gray -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" style="background-color: #E0E0E0; border: none;"> <!-- Softer gray -->
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top" alt="French">
                        <div class="card-body text-center">
                            <p class="card-text" style="color: #495057;">French</p> <!-- Softer dark gray -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" style="background-color: #E0E0E0; border: none;"> <!-- Softer gray -->
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top" alt="French">
                        <div class="card-body text-center">
                            <p class="card-text" style="color: #495057;">French</p> <!-- Softer dark gray -->
                        </div>
                    </div>
                </div><div class="col-6">
                    <div class="card" style="background-color: #E0E0E0; border: none;"> <!-- Softer gray -->
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top" alt="French">
                        <div class="card-body text-center">
                            <p class="card-text" style="color: #495057;">French</p> <!-- Softer dark gray -->
                        </div>
                    </div>
                </div><div class="col-6">
                    <div class="card" style="background-color: #E0E0E0; border: none;"> <!-- Softer gray -->
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top" alt="French">
                        <div class="card-body text-center">
                            <p class="card-text" style="color: #495057;">French</p> <!-- Softer dark gray -->
                        </div>
                    </div>
                </div><div class="col-6">
                    <div class="card" style="background-color: #E0E0E0; border: none;"> <!-- Softer gray -->
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top" alt="French">
                        <div class="card-body text-center">
                            <p class="card-text" style="color: #495057;">French</p> <!-- Softer dark gray -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Side panel -->
        <div class="container position-relative center">
            <div class="row align-items-center flex-wrap"> <!-- Add flex-wrap to allow wrapping -->
                <!-- Left Column -->
                <div class="col-md-6">
                    <h1 class="display-4" style="color: #3A5A78;">Cours Categories</h1>
                    <p class="lead fs-2" style="color: #A3BFD9;"> Débutez Votre Apprentissage,</p>
                    <p class="lead fs-2" style="color: #A3BFD9; margin-top:-20px;">Une Opportunité Pour <span style="font-size: 2.5rem; color: #F4A261;">Chacun.</span></p>
                </div>
                <!-- Right Column -->
                <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                    <button id="side-pannel" class="btn btn-primary btn-lg">View More</button>
                </div>
            </div>
            <div class="row gx-4 gy-4 justify-content-center flex-wrap"> <!-- Add flex-wrap to prevent overflow -->
                <div class="col-auto zoom">
                    <div class="card rounded-4 " style="width: 18rem;">
                        <img src="{{ asset('Items/frl.png') }}" class="card-img-top img-fluid rounded-top-4  " alt="Langue Française">
                        <div class="card-body p-3">
                            <h5 class="card-title" style="color: #3A5A78">Langue Française</h5>
                            <p class="card-text">Apprenez les bases de la langue française, y compris la grammaire, le vocabulaire et la conversation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-auto zoom">
                    <div class="card rounded-4" style="width: 18rem;">
                        <img src="{{ asset('Items/islamic.png') }}" class="card-img-top img-fluid rounded-top-4" alt="Études Islamiques">
                        <div class="card-body p-3">
                            <h5 class="card-title" style="color: #3A5A78">Études Islamiques</h5>
                            <p class="card-text">Explorez l'histoire et les enseignements de l'Islam, ainsi que ses contributions à la culture et à la science.</p>
                        </div>
                    </div>
                </div>
                <div class="col-auto zoom">
                    <div class="card rounded-4" style="width: 18rem;">
                        <img src="{{ asset('Items/math.png') }}" class="card-img-top img-fluid rounded-top-4" alt="Mathématiques">
                        <div class="card-body p-3">
                            <h5 class="card-title" style="color: #3A5A78">Mathématiques</h5>
                            <p class="card-text">Renforcez vos compétences en résolution de problèmes avec des concepts mathématiques essentiels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-auto zoom">
                    <div class="card rounded-4" style="width: 18rem;">
                        <img src="{{ asset('Items/physics.png') }}" class="card-img-top img-fluid rounded-top-4" alt="Physique">
                        <div class="card-body p-3">
                            <h5 class="card-title" style="color: #3A5A78">Physique</h5>
                            <p class="card-text">Découvrez les lois de la nature et explorez les concepts fondamentaux de la physique.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
    
@endsection
