@extends('layouts.app', ['Nav' => true])

@section('content')
    <section class="mt-5 pt-5">
        <div class="container mt-5 pt-5">

            <div class="card p-4 rounded-5 bg-white bg-opacity-50" style="opacity: 0.99;">
                <h1 class="row d-flex align-items-center justify-content-center mb-5 text-decoration-underline" style="color: #F4A261; ">
                    {{ $document->name_document }}</h1>
                <div class="row  d-flex flex-wrap d-flex align-items-center">
                    <div class="mb-3 col-md-6  ">
                        <div class="mb-3">
                            <h3><strong>{{ __('Nom:') }}</strong> <span style="color: #F4A261">{{ $document->name_document }}</span></h3>
                        </div>
                        <div class="mb-3">
                            <h3><strong>{{ __('Niveau:') }}</strong> <span style="color: #F4A261">{{ $document->niveau_document }}</span></h3>
                        </div>
                        <div class="mb-3">
                            <h3><strong>{{ __('Langue:') }}</strong> <span style="color: #F4A261">{{ $document->language }}</span></h3>
                        </div>
                    </div>
                    <div class="mb-3 col-6 border border-primary border-5 rounded-3 bg-primary bg-opacity-10 mr-5">
                        <span>{!! $document->description_document !!}</span>
                    </div>
                </div>
                <div class="mb-3  d-flex align-items-center justify-content-center">
                    <h2><strong>{{ __('Fichier:') }}</strong>
                        <a href="{{ asset('storage/' . $document->file_document) }}" style="color: #F4A261"
                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            target="_blank" download>{{ __('Télécharger le document') }}</a>
                    </h2>
                </div>
            </div>
        </div>
    </section>
@endsection
