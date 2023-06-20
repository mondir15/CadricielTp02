@extends('layouts.app')

@section('title', trans('lang.create_article'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('lang.create_article')</div>

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

                        <form method="POST" action="{{ route('article.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">@lang('lang.title') ( @lang('lang.francais') )</label>
                                <input type="text" name="title_fr" id="title_fr" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="content">@lang('lang.content') ( @lang('lang.francais') ) </label>
                                <textarea name="content_fr" id="content_fr" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="title">@lang('lang.title') ( @lang('lang.anglais') )</label>
                                <input type="text" name="title_en" id="title_en" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="content">@lang('lang.content') ( @lang('lang.anglais') ) </label>
                                <textarea name="content_en" id="content_en" class="form-control" rows="5" required></textarea>
                            </div>
<!-- 
                            <div class="form-group">
                                <label for="language">@lang('lang.lang')</label>
                                <select name="language" id="language" class="form-control" required>
                                    <option value="fr" {{ old('language') == 'fr' ? 'selected' : '' }}>@lang('lang.francais')</option>
                                    <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>@lang('lang.anglais')</option>
                                </select>
                            </div> -->

                            <button type="submit" class="btn btn-primary">@lang('lang.create_article')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
