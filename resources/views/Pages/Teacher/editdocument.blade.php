@extends('layouts.appT', ['Nav' => true])

@section('content')
    <section class=" mt-5 pt-5">

        <div class="container  mt-5 pt-5">
            <h1 style="margin-left: 120px">{{ __('Edit Document') }}</h1>
            <form action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-4">
                            <div class="row mb-3 align-items-start">
                                <div class="col row align-items-start">
                                    <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Nom') }}</label>
                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control  border border-primary" name="name"
                                            value="{{ $document->name_document }}" required>
                                    </div>
                                </div>
                                <div class="col row align-items-start">
                                    <label for="level" class="col-md-3 col-form-label text-md-end">{{ __('Niveau') }}</label>
                                    <div class="col-md-7">
                                        <select id="level" type="level" class="form-control  border border-primary" name="level" required>
                                            <option value="{{ $document->niveau_document }}">{{ $document->niveau_document }}</option>
                                            <optgroup label="{{ __('Primaire') }}">
                                                @foreach (['Primaire Premiere Annee' => __('Premier Annee'), 'Primaire Deuxieme Annee' => __('Deuxieme Annee'), 'Primaire Troisieme Annee' => __('Troisieme Annee'), 'Primaire Quatrieme Annee' => __('Quatrieme Annee'), 'Primaire Cinquieme Annee' => __('Cinquieme Annee'), 'Primaire Sixieme Annee' => __('Sixieme Annee')] as $value => $label)
                                                    @if ($value !== $document->niveau_document)
                                                        <option value="{{ $value }}" {{ old('level') == $value ? 'selected' : '' }}>
                                                            {{ $label }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="{{ __('College') }}">
                                                @foreach (['College Premiere Annee' => __('Premiere Annee'), 'College Deuxieme Annee' => __('Deuxieme Annee'), 'College Troisieme Annee' => __('Troisieme Annee')] as $value => $label)
                                                    @if ($value !== $document->niveau_document)
                                                        <option value="{{ $value }}" {{ old('level') == $value ? 'selected' : '' }}>
                                                            {{ $label }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="{{ __('Lycee') }}">
                                                @foreach (['Lycee Premiere Annee' => __('Premiere Annee'), 'Lycee Deuxieme Annee' => __('Deuxieme Annee'), 'Lycee Troisieme Annee' => __('Troisieme Annee')] as $value => $label)
                                                    @if ($value !== $document->niveau_document)
                                                        <option value="{{ $value }}" {{ old('level') == $value ? 'selected' : '' }}>
                                                            {{ $label }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-start">
                                <div class="col row align-items-start">
                                    <label for="file" class="col-md-4 col-form-label text-md-end mt-3 ">{{ __('Fichier') }}</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control mt-3 mb-2 border border-primary" id="file" name="file">
                                        <p class="mt-3 ">
                                            <strong>{{ __('Fichier actuel:') }}</strong>
                                            <a href="{{ asset('storage/' . $document->file_document) }}" target="_blank"
                                                download>{{ __('Fichier') }}</a>
                                        </p>

                                    </div>
                                </div>

                                <div class="col row align-items-start mt-3">
                                    <label for="language" class="col-md-3 col-form-label text-md-end ">{{ __('Matière') }}</label>
                                    <div class="col-md-7">
                                        <select id="language" type="language" class="form-control border border-primary" name="language" required>
                                            <option value="{{ $document->language }}">{{ $document->language }}</option>
                                            @foreach ($languages as $language)
                                                @if ($language->name_language !== $document->language)
                                                    <option
                                                        value="{{ $language->name_language }}"{{ old('language') == $language->name_language ? 'selected' : '' }}>
                                                        {{ $language->name_language }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center flex-column">
                                <label for="description" class="col-md-2 col-form-label ">{{ __('Description') }}</label>
                            </div>
                            {{-- Modify the Textarea --}}
                            <div class="row mb-3">
                                <div class="col-md-10 offset-md-1">
                                    <textarea id="description" class="form-control " name="description" required>{{ $document->description_document }}{{ old('description') == $document->description_document ? 'selected' : '' }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <button type="submit" class="btn btn-primary ">Mettre à jour</button>
                                <a class="btn btn-secondary border border-primary" href="{{ route('document') }}">Annuler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
