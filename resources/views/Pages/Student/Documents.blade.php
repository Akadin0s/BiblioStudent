@extends('layouts.app', ['Nav' => true])

@section('content')
    @if (empty($isFiltering))
        <section class="mb-5">
            <div class="object-fit-cover position-relative"
                style="background-image: url('{{ asset('Items/courses.png') }}'); background-size: cover; background-position: center; min-height: 40vh; height: 100vh; width: 100%;">
                <div class="container position-absolute top-50 start-0 translate-middle-y" style="width: 70%;">
                    <div class="row justify-content-center">
                        <div class="p-4 mb-2 bg-secondary text-dark rounded-4 border border-light sm:w-75 w-50">
                            <h1 class="display-5 display-md-2 text-center">Espace documents</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="{{ !empty($isFiltering) ? 'pt-5' : '' }} mb-5  pb-5">
        <div class="mt-5 mb-5 pb-5">
            <div class="container position-relative">
                <div class="row align-items-center flex-wrap mb-4">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h1 class="display-6 display-md-4" style="color: #3A5A78;">Tout les Documents</h1>
                    </div>
                    <div class="col-12 col-md-6">
                        <form class="d-flex" role="search" onsubmit="return false;">
                            <input id="searchInput" class="form-control me-2 border border-primary" type="search" placeholder="Search"
                                aria-label="Search" onkeyup="filterDocuments()">
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center gap-3" id="documentsContainer">
                    @foreach ($documents as $document)
                        <a href="{{ route('detail', ['id' => $document->id]) }}"
                            class="card mb-3 col-12 col-sm-6 col-md-4 col-lg-3 text-decoration-none document-card"
                            style="max-width: 18rem; background-color: #EAF0F3; border: 3px solid #E2D3B3;">
                            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #EAF0F3;">
                                <h4 class="bolder" style="color: #1E3D59;">{{ $document->language }}</h4>
                                {{-- Document Type Icon --}}
                                @php
                                    $extension = pathinfo($document->file_document, PATHINFO_EXTENSION);
                                @endphp
                                <img src="{{ asset('Items/' . $extension . '.png') }}" alt="{{ $extension }} icon" style="width: 24px; height: 24px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: #5C7D99;">
                                    {{ implode(' ', array_slice(explode(' ', $document->niveau_document), 1, 2)) }}
                                    <span style="color: #F4A261;">({{ explode(' ', $document->niveau_document)[0] }})</span>
                                </h5>
                                <p class="card-text" style="color: #1E3D59;">{{ $document->name_document }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
