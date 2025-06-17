@extends('layouts.appA', ['Nav' => true])

@section('content')
    <section class="mt-5 pt-5">
        <div class="container mt-5 pt-5">
            <h1>Modifier la langue</h1>
            <form action="{{ route('language.update', $language->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row d-flex align-items-center">
                    {{-- Left side: Image --}}
                    <div class="col-md-4">
                        <div class="mb-2">
                            <div>
                                <img src="{{ asset('storage/' . $language->image_path) }}" alt="Language Image" class="img-thumbnail"
                                    style="max-width: 90%;">
                            </div>
                        </div>
                    </div>

                    {{-- Right side: Form fields --}}
                    <div class="col-md-8">
                        <div class="card p-4">
                            {{-- Input for uploading a new image --}}
                            <div class="mb-3">
                                <label for="file" class="form-label">Nouvelle image</label>
                                <input type="file" class="form-control border border-primary" id="file" name="file">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control border border-primary" id="name" name="name"
                                    value="{{ $language->name_language }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control border border-primary" id="title" name="title"
                                    value="{{ $language->title_language }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control border border-primary" id="description" name="description"
                                    value="{{ $language->description_language }}" required>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <button type="submit" class="btn btn-primary ">Mettre à jour</button>
                                <a class="btn btn-secondary border border-primary" href="{{ route('dashboard') }}">Annuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
