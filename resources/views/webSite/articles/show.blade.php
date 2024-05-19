@extends('layouts.site.app')
@section('content')
    <style>
        #mbody1 {
            direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
            text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
        }
    </style>
    
    <div class="containerr mt-5" id="mbody1" style="margin-inline: 30px;">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
         <img src="{{ asset('dist/img/articles/' . $article->image) }}" class="card-img-top" style="height: 300px; padding-top:10px ;"
          alt="card image">
        <!-- Article Section -->
        <div class="row" style="margin-bottom: 30px;">
            <div class="col" style=" margin-inline: 30px;">
                <h2>{{ $article->{app()->getLocale() . '_title'} }}</h2>
                <p>{{ $article->{app()->getLocale() . '_content'} }}</p>
            </div>
        </div>

        <div class="row mt-4" style="margin: 40px; padding-top: 30px; ">
            <div class="col">
                <h5>{{ __('Comments') }}</h3>
                    <div id="commentsSection">
                    </div>
            </div>
        </div>
        @forelse ($comments as $comment)
            <div class="row mt-4" style="margin-left:  50px;margin-right:  50px; padding-bottom: 30px;">
                <div class="col">
                    <h5> {{ $comment->user->first_name . ' ' . $comment->user->last_name }}</h3>
                        <div id="commentsSection">
                            <p> {{ $comment->content }} </p>
                        </div>
                </div>
            </div>
        @empty
            <div class="row mt-4" style="margin-left:  50px;margin-right:  50px; padding-bottom: 30px;">
                <div class="col">
                    <div id="commentsSection">
                        <p> {{ __('No comments exist') }} </p>
                    </div>
                </div>
            </div>
        @endforelse

        @if (Auth::guard('web')->user())
            <!-- Add Article Section -->
            <div class="row mt-4" style="margin: 40px; padding-top: 20px;">
                <div class="col">
                    <h3>{{ __('Add comment') }}</h3>
                    <form action="{{ route('comments.store') }}" method="POST" id="newArticleForm">
                        @csrf
                        @method('post')
                        <!--<div class="form-group">-->
                        <!--    <label for="newArticleTitle">{{ __('Title') }}:</label>-->
                        <!--    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"-->
                        <!--        id="newArticleTitle" value="{{ old('title') }}">-->
                        <!--    @error('title')-->
                        <!--        <span class="invalid-feedback" role="alert">-->
                        <!--            <strong>{{ $message }}</strong>-->
                        <!--        </span>-->
                        <!--    @enderror-->
                        <!--</div>-->
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group">
                            <label for="newArticleContent">{{ __('The content') }}:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="newArticleContent"
                                rows="3">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: darkgoldenrod">{{ __('Add') }}</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row mt-4" style="margin: 40px; padding-top: 20px;">
                <div class="col">
                    <h3 class="text-danger">{{ __('Login to add a comment') }}</h3>
                </div>
            </div>
        @endif


    </div>
    </div>
@endsection
