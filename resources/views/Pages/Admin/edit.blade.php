@extends('layouts.appA', ['Nav' => true])

@section('content')
    <section class="mt-5 pt-5">
        <div class="container mt-5 pt-5 card shadow p-4">
            <h1 class="mb-3" style="color: #F4A261">Modifier l’utilisateur</h1>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control border border-primary" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control border border-primary" id="lastname" name="lastname" value="{{ $user->lastname }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control borde border-primary" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (Leave blank to keep current password)</label>
                    <input type="password" class="form-control border border-primary" id="password" name="password">
                </div>
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a class="btn btn-secondary border border-primary" href="{{ route('dashboard') }}">Annuler</a>
                </div>

            </form>
        </div>
    </section>
@endsection
