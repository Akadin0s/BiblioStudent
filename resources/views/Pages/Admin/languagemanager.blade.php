@extends('layouts.appA', ['Nav' => true])

@section('content')
    <section class="d-flex align-items-center justify-content-center vh-100">
        {{-- Success Notification --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="position: absolute; top: 100px; right: 10px; z-index: 1050; max-width: 300px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container mt-n5 pt-n5">
            <div class="row justify-content-center mt-n5">
                <div class="col-md-8 mt-n5 fancy-box">
                    <div class="d-flex justify-content-center z-2 mb-n4 ">
                        <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="200" height="200">
                    </div>
                    <div class="card z-3">
                        <div class="card-header">{{ __('Détails de la langue') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('languagemanager') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div class=" row d-flex align-items-end">
                                            <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Nom') }}</label>

                                            <div class="col-md-9">
                                                <input id="name" type="text"
                                                    class="form-control  border border-primary @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row align-items-start">
                                            <label for="title" class="col-md-3 col-form-label text-md-end">{{ __('Titre') }}</label>

                                            <div class="col-md-9">
                                                <input id="title" type="text"
                                                    class="form-control  border border-primary @error('title') is-invalid @enderror" name="title"
                                                    value="{{ old('title') }}" required autocomplete="title" autofocus>

                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <label for="description" class="col-form-label text-md-end">{{ __('Description') }}</label>

                                        <div class="col-md-7">
                                            <input id="description" type="description"
                                                class="form-control  border border-primary @error('description') is-invalid @enderror" name="description"
                                                value="{{ old('description') }}" required autocomplete="description">

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <label for="file" class=" col-form-label text-md-end">{{ __('Image') }}</label>
                                        <div class="col-md-7">
                                            <input type="file" class="form-control  border border-primary @error('image') is-invalid @enderror"
                                                id="file" name="file" accept="image/*" required autocomplete="file">
                                            @error('fine')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
