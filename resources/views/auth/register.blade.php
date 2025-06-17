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
        <div class="container mt-n5">
            <div class="row justify-content-center mt-n5">
                <div class="col-md-8 mt-n5 fancy-box">
                    <div class="d-flex justify-content-center z-2 mb-n4 ">
                        <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="200" height="200">
                    </div>
                    <div class="card z-3">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('usermanager') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div class=" row align-items-start">
                                            <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Nom') }}</label>

                                            <div class="col-md-8">
                                                <input id="name" type="text"
                                                    class="form-control border border-primary @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" row">
                                            <label for="surname" class="col-md-3 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                            <div class="col-md-8">
                                                <input id="surname" type="text"
                                                    class="form-control border border-primary @error('surname') is-invalid @enderror" name="surname"
                                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                                @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse e-mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control border border-primary @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control border border-primary @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirmer le mot de passe') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control border border-primary"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Rôle') }}</label>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="form-check me-3">
                                            <input class="form-check-input border border-primary" type="radio" name="role" id="student"
                                                value="Étudiant" required>
                                            <label class="form-check-label" for="student">
                                                {{ __('Étudiant') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input border border-primary" type="radio" name="role" id="teacher"
                                                value="Enseignant" required>
                                            <label class="form-check-label" for="teacher">
                                                {{ __('Enseignant') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0 ">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            S'inscrire
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
