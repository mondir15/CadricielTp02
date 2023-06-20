@extends('layouts.app')

@section('title', trans('lang.share_file'))
@section('titleHeader', trans('lang.share_file'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('lang.share_file')</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="file">Fichier</label>
                                <input type="file" name="file" id="file" class="form-control-file" required>
                            </div>

                            <div class="form-group">
                               
                            </div>
                            <input type="text" name="filename_fr" id="filename_fr" class="form-control" required>@lang('lang.titre') (@lang('lang.francais'))
                            <input type="text" name="filename_en" id="filename_en" class="form-control" required>@lang('lang.titre') (@lang('lang.anglais'))


                            <button type="submit" class="btn btn-primary">Partager</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
