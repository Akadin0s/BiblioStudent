@extends('layouts.app', ['Nav' => true])

@section('content')
    <section>
        <script>
            const baseUrl = "{{ url('/') }}"; // Pass the base URL to JavaScript
        </script>
        <div class="d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('Items/Languagcard.png') }}'); background-size: cover; background-position: center; min-height: 100vh; width: 100%;">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-auto" style="margin-right: 1rem;">
                    <div class="card rounded-4 " style="width: 18rem;">
                        <img src="{{ asset('storage/' . $language->image_path) }}" class="card-img-top img-fluid rounded-top-4" alt="Langue Française">
                        <div class="card-body p-3">
                            <h5 class="card-title" style="color: #3A5A78">{{ $language->title_language }}</h5>
                            <p class="card-text">{{ $language->description_language }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row">
                        <!-- Subniveau Section -->
                        <div class="col-auto align-self-center">
                            <div class="rounded-4 niveau-hover niveau-document mb-4 size-width " id="subniveau" onclick="showNiveaus(this)">
                                <h5 class="text-center fs-3 mb-2">Primaire</h5>
                            </div>
                            <div class="rounded-4 niveau-hover niveau-document mb-4 size-width" id="subniveau" onclick="showNiveaus(this)">
                                <h5 class="text-center fs-3 mb-2">College</h5>
                            </div>
                            <div class="rounded-4 niveau-hover niveau-document mb-4 size-width" id="subniveau" onclick="showNiveaus(this)">
                                <h5 class="text-center fs-3 mb-2">Lycee</h5>
                            </div>
                        </div>

                        <!-- Niveaus Section -->
                        <div class="col-auto align-self-center" style="max-height: 80vh;">
                            <!-- Primaire Niveaus -->
                            <div id="primaire-niveaus" class="niveaus" style="display: none;">
                                <div class="rounded-4 niveau-hover niveau-document size-width mb-3" id="nv"
                                    onclick="redirectToDocument('Primaire', 'Premiere Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3 mb-2">Premiere Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document size-width mb-3" id="nv"
                                    onclick="redirectToDocument('Primaire', 'Deuxieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3 mb-2">Deuxieme Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document size-width mb-3" id="nv"
                                    onclick="redirectToDocument('Primaire', 'Troisieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3 mb-2">Troisieme Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document size-width mb-3" id="nv"
                                    onclick="redirectToDocument('Primaire', 'Quatrieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3 mb-2">Quatrieme Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document size-width mb-3" id="nv"
                                    onclick="redirectToDocument('Primaire', 'Cinquieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3 mb-2">Cinquieme Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document size-width mb-3" id="nv"
                                    onclick="redirectToDocument('Primaire', 'Sixieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3 mb-2">Sixieme Annee</h5>
                                </div>
                            </div>

                            <!-- College Niveaus -->
                            <div id="college-niveaus" class="niveaus" style="display: none;">
                                <div class="rounded-4 niveau-hover niveau-document" id="nv" style="margin-bottom:1rem;"
                                    onclick="redirectToDocument('College', 'Premiere Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3" style="padding-top: 5px;">Premiere Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document" id="nv"
                                    style="margin-bottom:1rem;"onclick="redirectToDocument('College', 'Deuxieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3" style="padding-top: 5px;">Deuxieme Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document" id="nv"
                                    style="margin-bottom:1rem;"onclick="redirectToDocument('College', 'Troisieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3" style="padding-top: 5px;">Troisieme Annee</h5>
                                </div>
                            </div>

                            <!-- Lycee Niveaus -->
                            <div id="lycee-niveaus" class="niveaus" style="display: none;">
                                <div class="rounded-4 niveau-hover niveau-document" id="nv" style="margin-bottom:1rem;"
                                    onclick="redirectToDocument('Lycee', 'Premiere Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3" style="padding-top: 5px;">Premiere Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document" id="nv"
                                    style="margin-bottom:1rem;"onclick="redirectToDocument('Lycee', 'Deuxieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3" style="padding-top: 5px;">Deuxieme Annee</h5>
                                </div>
                                <div class="rounded-4 niveau-hover niveau-document" id="nv"
                                    style="margin-bottom:1rem;"onclick="redirectToDocument('Lycee', 'Troisieme Annee', '{{ $language->name_language }}')">
                                    <h5 class="text-center fs-3" style="padding-top: 5px;">Troisieme Annee</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
