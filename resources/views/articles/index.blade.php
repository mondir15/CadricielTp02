@extends('layouts.app')

@section('title', 'forum')
@section('titleHeader', 'forum')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum</div>
                <a href="{{ route('article.create') }}" class="btn btn-primary mb-3">@lang('lang.create_article')</a>
                <div class="card-body">
                  

                    
                    <div class="mb-3">
                        <button id="lang-fr" class="btn btn-sm btn-primary lang-btn">@lang('lang.francais')</button>
                        <button id="lang-en" class="btn btn-sm btn-primary lang-btn">@lang('lang.anglais')</button>
                    </div>

                    @foreach($articles as $article)
                        <div class="article mb-3" data-lang="fr">
               
                            <h5>{{ $article->title_fr }}</h5>
                            <p>{{ $article->content_fr }}</p>
                            <!-- <p>@lang('lang.lang') : {{ $article->language }}</p> -->
                            <!--<p>@lang('lang.author') : {{ $article->user->etudiant->nom}}</p>-->

                            @if(auth()->user()->id === $article->user_id)
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-primary">@lang('lang.edit_etudiant')</a>
                                <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">@lang('lang.delete_etudiant')</button>
                                </form>
                            @endif
                        </div>

                        <div class="article mb-3" data-lang="en">
                            <h5>{{ $article->title_en }}</h5>
                            <p>{{ $article->content_en }}</p>
                            <!-- <p>@lang('lang.lang') : {{ $article->language }}</p> -->
                            
                            <p>@lang('lang.author') : {{ $article->user->etudiant->nom}}</p>

                            @if(auth()->user()->id === $article->user_id)
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            @endif
                        </div>
                        <hr>
                    @endforeach

                    <div class="pagination">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
