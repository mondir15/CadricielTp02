@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Student {{ $etudiant->nom }}</h1>
    <form method="POST" action="{{ route('etudiants.update', $etudiant->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom" class="fw-bold">Name</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
        </div>
        <div class="form-group">
            <label for="adresse" class="fw-bold">Adress</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etudiant->adresse }}" required>
        </div>
        <div class="form-group">
            <label for="phone" class="fw-bold">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $etudiant->phone }}" required>
        </div>
        <div class="form-group">
            <label for="email" class="fw-bold">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}" required>
        </div>
        <div class="form-group">
            <label for="ville_id" class="fw-bold">City</label>
            <select class="form-control" id="ville_id" name="ville_id">
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-success my-4">Edit</button>
    <a href="{{ route('etudiants.index') }}" class="btn btn-danger my-4">Return</a>
</div>

    </form>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .form-group {
        margin-bottom: 20px;
        padding: 0 10rem;
    }

    .form-control {
        border-radius: 0;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 0;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        border-radius: 0;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .fw-bold {
        font-weight: bold;
    }

    .my-4 {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
@endsection
