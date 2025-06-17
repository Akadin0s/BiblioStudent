@extends('layouts.app', ['Nav' => true])

@section('content')
    <section class="d-flex align-items-center justify-content-center vh-100 mt-n5">
        <div class="container mt-n5">
            <div class="row justify-content-center mt-n5">
                <div class="col-md-8 mt-n5 ">
                    <div class="d-flex justify-content-center z-2 mb-n4 ">
                        <img src="{{ asset('Items/logo.png') }}" alt="Logo" width="200" height="200">
                    </div>
                    <div class="card z-3">
                        <div class="card-header d-flex justify-content-center">
                            <H1>{{ __('Profil') }}</H1>
                        </div>

                        <div class="card-body">

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control text-center  border border-primary" name="name"
                                        value="{{ Auth::user()->name }}" readonly autofocus placeholder="Name">
                                </div>
                                <div class="col-md-4">
                                    <input id="surname" type="text" class="form-control text-center  border border-primary" name="surname"
                                        value="{{ Auth::user()->lastname }}" readonly placeholder="Surname">
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control text-center  border border-primary" name="email"
                                        value="{{ Auth::user()->email }}" readonly placeholder="Email">
                                </div>
                            </div>

                            <div class="row mb-0 ">
                                <div class="d-flex align-items-center justify-content-center">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary " style="width: 135px;">
                                            {{ __('Se déconnecter') }}
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
