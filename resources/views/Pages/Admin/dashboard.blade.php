@extends('layouts.appA', ['Nav' => true])
@php
    $typeCounts = [];

    foreach ($documents as $doc) {
        $ext = strtolower(pathinfo($doc->file_document, PATHINFO_EXTENSION));
        if (!isset($typeCounts[$ext])) {
            $typeCounts[$ext] = 0;
        }
        $typeCounts[$ext]++;
    }
@endphp
@section('content')
    <div class="container mt-5 pt-1 mb-5">
        {{-- Success Notification --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="position: absolute; top: 100px; right: 10px; z-index: 1050; max-width: 300px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-5 pt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Dashboard</h1>
                    <p class="text-center">Bienvenue dans le dashboard de l’administrateur !</p>
                </div>
            </div>
            <div class="row mt-4 border-0 gap-4 d-flex justify-content-center">
                <div class="col-3 border rounded shadow bg-secondary p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{ __('Total Documents') }}: </h3>
                        <h3>{{ $documents->count() }}</h3>
                    </div>
                </div>
                @foreach ($typeCounts as $type => $count)
                    <div class="col-2 border rounded shadow bg-secondary p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="{{ asset('Items/' . $type . '.png') }}" style="width: 38px; height: 38px;">
                            <strong>{{ strtoupper($type) }}:</strong>
                            <h3> {{ $count }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4 border-0">
                <div class="col-md-12 border rounded shadow bg-primary p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Nombre total d’utilisateurs: {{ $users->count() }}</h2>
                        <div class="d-flex align-items-center">

                            {{-- Search Bar --}}
                            <div style="width: 300px;">
                                <input type="text" id="userSearch" class="form-control  border border-primary"
                                    placeholder="Rechercher des utilisateurs...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover rounded mt-3" id="usersTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rôle</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center align-middle">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Mettre à jour</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Controls --}}
                    <div class="text-center mt-3">
                        <button id="prevPage" class="btn btn-secondary" disabled>Précédent</button>
                        <span id="pageInfo" class="mx-3"></span>
                        <button id="nextPage" class="btn btn-secondary">Suivant</button>
                    </div>
                </div>
            </div>

            <div class="row mt-4 border-0">
                <div class="col-md-12 border rounded shadow bg-secondary p-4">
                    <h2>Nombre total de matières: {{ $languages->count() }}</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover rounded mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center align-middle">
                                @foreach ($languages as $language)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $language->image_path) }}" alt="Language Image" class="img-thumbnail"
                                                style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                        </td>
                                        <td>{{ $language->name_language }}</td>
                                        <td>{{ $language->title_language }}</td>
                                        <td>{{ $language->description_language }}</td>
                                        <td>
                                            <a href="{{ route('language.edit', $language->id) }}" class="btn btn-warning btn-sm">Mettre à jour</a>
                                            <form action="{{ route('language.destroy', $language->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this language?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
