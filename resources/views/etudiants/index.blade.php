
@extends('layouts.app')
@section('title', __('lang.text_title'))
@section('titleHeader', __('lang.text_title'))
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
                <th>@lang('lang.text_name')</th>
                <th>@lang('lang.text_email')</th>
                <th>@lang('lang.text_phone')</th>
                <th>@lang('lang.text_address')</th>
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
                    <td>{{ $etudiant->adresse}}</td>
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
