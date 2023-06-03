@extends('layouts.app')

@section('title', 'Add a student')

@section('titleHeader', 'Add a student')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('etudiants.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom" class="fw-bold">Name</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="adresse" class="fw-bold">Address</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>
        <div class="form-group">
            <label for="phone" class="fw-bold">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email" class="fw-bold">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date_de_naissance" class="fw-bold">Date of Birth</label>
            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
        </div>
        <div class="form-group">
            <label for="ville_id" class="fw-bold">City</label>
            <select class="form-select" id="ville_id" name="ville_id">
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Add</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-danger mt-3">Return</a>
    </form>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
        padding: 0 10rem;
    }

    .form-group {
        margin-bottom: 20px;
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
</style>
@endsection
