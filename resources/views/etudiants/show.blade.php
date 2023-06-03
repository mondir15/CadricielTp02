@extends('layouts.app')
@section('title', 'Show Student')
@section('titleHeader', 'Student')
@section('content')

<div class="container">
    <div class="card mx-auto" style="max-width: 500px; height: 500px; font-size:24px;">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $etudiant->nom }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Email: {{ $etudiant->email }}</h6>
            <p class="card-text">
                Address: {{ $etudiant->adresse }}<br>
                Phone Number: {{ $etudiant->phone }}<br>
                Date of Birth: {{ $etudiant->date_de_naissance }}<br>
            </p>
            <a href="{{ route('etudiants.index') }}" class="btn btn-primary">Return</a>
        </div>
    </div>
</div>
@endsection
