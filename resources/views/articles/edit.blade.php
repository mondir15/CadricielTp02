@extends('layouts.app')

@section('title', trans('lang.edit_etudiant'))
@section("titleHeader", trans('lang.edit_etudiant'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('lang.edit_article')</div>

                <div class="card-body">
                    <form action="{{ route('forum.update', $article->id) }}" method="POST">
                        @csrf
                        @method('PUT')

               
                        <div class="form-group">
                                <label for="title">@lang('lang.title') ( @lang('lang.francais') )</label>
                                <input type="text" name="title_fr" id="title_fr" class="form-control" value="{{ old('title_fr', $article->title_fr) }}" required>

                            </div>

                            <div class="form-group">
                                <label for="content">@lang('lang.content') ( @lang('lang.francais') ) </label>
                                <textarea name="content_fr" id="content_fr" class="form-control" rows="5" placeholder="{{ old('content_fr', $article->content_fr) }}" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="title">@lang('lang.title') ( @lang('lang.anglais') )</label>
                                <input type="text" name="title_en" id="title_en" class="form-control" value="{{ old('title_en', $article->title_en) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="content">@lang('lang.content') ( @lang('lang.anglais') ) </label>
                                <textarea name="content_en" id="content_en" class="form-control" rows="5" placeholder="{{ old('content_en', $article->content_en) }}" required></textarea>
                            </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
