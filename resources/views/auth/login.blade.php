@extends('layouts.app', ['Nav' => false])

@section('content')
    <section class="d-flex align-items-center justify-content-center vh-100 mt-n5">
        <div class="container  mt-n5 ">
            <div class="row justify-content-center mt-n5">
                <div class="col-md-8 mt-n5 fancy-box">
                    <div class="d-flex justify-content-center z-2 mb-n4 ">
                        <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="200" height="200">
                    </div>
                    <div class="card  z-3">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control  border border-primary @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control border border-primary @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-0 col-1 mx-auto">
                                    <div class="col-md-2 ">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
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
