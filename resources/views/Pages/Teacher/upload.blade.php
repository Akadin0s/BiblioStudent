@extends('layouts.appT', ['Nav' => true])

@section('content')
    <section class="d-flex align-items-center justify-content-center vh-100 pt-5">
        {{-- Success Notification --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="position: absolute; top: 100px; right: 10px; z-index: 1050; max-width: 300px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container mt-2">
            <div class="row justify-content-center mt-n5">
                <div class="col-md-10 mt-n5 fancy-box">
                    <div class="d-flex justify-content-center z-2 mb-n4 ">
                        <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="200" height="200">
                    </div>
                    <div class="card z-3">
                        <div class="card-header">{{ __('Détails du document') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3 align-items-start">
                                    <div class="col row align-items-start">
                                        <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Nom') }}</label>

                                        <div class="col-md-9">
                                            <input id="name" type="text"
                                                class="form-control  border border-primary @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="Name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col row align-items-start">
                                        <label for="level" class="col-md-3 col-form-label text-md-end">{{ __('Niveau') }}</label>
                                        <div class="col-md-7">
                                            <select id="level" type="level"
                                                class="form-control  border border-primary @error('level') is-invalid @enderror" name="level" required
                                                autocomplete="level">
                                                <option value="">{{ __('Sélectionnez un niveau') }}</option>
                                                <optgroup label="{{ __('Primaire') }}">
                                                    <option value="Primaire Premiere Annee"
                                                        {{ old('level') == 'Primaire Premiere Annee' ? 'selected' : '' }}>{{ __('Premier Annee') }}
                                                    </option>
                                                    <option value="Primaire Deuxieme Annee"
                                                        {{ old('level') == 'Primaire Deuxieme Annee' ? 'selected' : '' }}>{{ __('Deuxieme Annee') }}
                                                    </option>
                                                    <option value="Primaire Troisieme Annee"
                                                        {{ old('level') == 'Primaire Troisieme Annee' ? 'selected' : '' }}>{{ __('Troisieme Annee') }}
                                                    </option>
                                                    <option value="Primaire Quatrieme Annee"
                                                        {{ old('level') == 'Primaire Quatrieme Annee' ? 'selected' : '' }}>{{ __('Quatrieme Annee') }}
                                                    </option>
                                                    <option value="Primaire Cinquieme Annee"
                                                        {{ old('level') == 'Primaire Cinquieme Annee' ? 'selected' : '' }}>{{ __('Cinquieme Annee') }}
                                                    </option>
                                                    <option value="Primaire Sixieme Annee"
                                                        {{ old('level') == 'Primaire Sixieme Annee' ? 'selected' : '' }}>{{ __('Sixieme Annee') }}
                                                    </option>
                                                </optgroup>
                                                <optgroup label="{{ __('College') }}">
                                                    <option value="College Premiere Annee"
                                                        {{ old('level') == 'College Premiere Annee' ? 'selected' : '' }}>{{ __('Premier Annee') }}
                                                    </option>
                                                    <option value="College Deuxieme Annee"
                                                        {{ old('level') == 'College Deuxieme Annee' ? 'selected' : '' }}>{{ __('Deuxieme Annee') }}
                                                    </option>
                                                    <option value="College Troisieme Annee"
                                                        {{ old('level') == 'College Troisieme Annee' ? 'selected' : '' }}>{{ __('Troisieme Annee') }}
                                                    </option>
                                                </optgroup>
                                                <optgroup label="{{ __('Lycee') }}">
                                                    <option value="Lycee Premiere Annee" {{ old('level') == 'Lycee Premiere Annee' ? 'selected' : '' }}>
                                                        {{ __('Premier Annee') }}</option>
                                                    <option value="Lycee Deuxieme Annee" {{ old('level') == 'Lycee Deuxieme Annee' ? 'selected' : '' }}>
                                                        {{ __('Deuxieme Annee') }}</option>
                                                    <option value="Lycee Troisieme Annee"
                                                        {{ old('level') == 'Lycee Troisieme Annee' ? 'selected' : '' }}>{{ __('Troisieme Annee') }}
                                                    </option>
                                                </optgroup>
                                            </select>
                                            @error('level')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-start">
                                    <div class="col row align-items-start">
                                        <label for="file" class="col-md-4 col-form-label text-md-end ">{{ __('Fichier') }}</label>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control  border border-primary @error('file') is-invalid @enderror"
                                                id="file" name="file" required autocomplete="file">
                                            @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col row align-items-start">
                                        <label for="language" class="col-md-3 col-form-label text-md-end">{{ __('Matière') }}</label>
                                        <div class="col-md-7">
                                            <select id="language" type="language"
                                                class="form-control border border-primary @error('language') is-invalid @enderror" name="language"
                                                required autocomplete="language">
                                                <option value="">{{ __('Sélectionnez une matière') }}</option>
                                                @foreach ($languages as $language)
                                                    <option
                                                        value="{{ $language->name_language }}"{{ old('language') == $language->name_language ? 'selected' : '' }}>
                                                        {{ $language->name_language }}</option>
                                                @endforeach
                                            </select>
                                            @error('language')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center flex-column">
                                    <label for="description" class="col-md-2 col-form-label ">{{ __('Description') }}</label>
                                </div>
                                {{-- Modify the Textarea --}}
                                <div class="row mb-3">

                                    <div class="col-md-10 offset-md-1">
                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-0 ">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Soumettre') }}
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
