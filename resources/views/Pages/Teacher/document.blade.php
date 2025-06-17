@extends('layouts.appT', ['Nav' => true])

@section('content')
    <section class="mb-5 mt-5 pt-5">
        {{-- Success Notification --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="position: absolute; top: 100px; right: 10px; z-index: 1050; max-width: 300px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-5 pt-5">
            <div class="container position-relative center ">
                <div class="row align-items-center flex-wrap mb-4">
                    <div class="col-md-6">
                        <h1 class="display-4" style="color: #3A5A78;">Tout les Documents</h1>
                    </div>
                    <div class="col-md-6">
                        <form class="d-flex" role="search" onsubmit="return false;">
                            <input id="searchInput" class="form-control me-2  border border-primary" type="search" placeholder="Search"
                                aria-label="Search" onkeyup="filterDocuments()">
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center gap-3" id="documentsContainer">
                    @foreach ($documents as $document)
                        <div class="card mb-3 text-decoration-none document-card position-relative"
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

                            <div class="hover-buttons d-flex justify-content-center align-items-center">
                                <a href="{{ route('document.edit', $document->id) }}" class="btn btn-primary me-2">{{ __('Mettre à jour') }}</a>
                                <form action="{{ route('document.destroy', $document->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this document?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
