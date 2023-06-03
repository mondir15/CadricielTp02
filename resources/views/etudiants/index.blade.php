<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Student Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('etudiants.index') }}">Students List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('etudiants.create') }}">Add Student</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@extends('layouts.app')
@section('title', 'Students')
@section('titleHeader', 'Students')
@section('content')

<style>
    .navbar {
    background-color: #f8f9fa;
}

.navbar-brand {
    color: #333;
    font-weight: bold;
}

.navbar-nav .nav-link {
    color: #333;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
    color: #007bff;
}

.navbar-toggler {
    border-color: #333;
}

.navbar-toggler-icon {
    background-color: #333;
}

.navbar-toggler:hover,
.navbar-toggler:focus {
    background-color: #007bff;
    border-color: #007bff;
}

</style>

<div class="container mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->phone }}</td>
                    <td>
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form method="POST" action="{{ route('etudiants.destroy', $etudiant->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
