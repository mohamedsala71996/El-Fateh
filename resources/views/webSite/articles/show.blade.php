@extends('layouts.site.app')
@section('content')
<div class="containerr mt-5" style="margin-inline: 30px;">
  <!-- Article Section -->
  <div class="row" style="margin-bottom: 30px;">
    <div class="col" style="text-align: left; margin-inline: 30px;">
      <h2>{{ $article->{app()->getLocale().'_title'} }}</h2>
      <p>{{ $article->{app()->getLocale().'_content'} }}</p>
    </div>
  </div>

  <div class="row mt-4" style="margin: 40px; padding-top: 30px; ">
    <div class="col">
      <h5>{{ __('Comments')}}</h3>
      <div id="commentsSection">
      </div>
    </div>
  </div>
  
  <div class="row mt-4" style="margin-left:  50px; padding-bottom: 30px;">
    <div class="col">
      <h5> alaa adel</h3>
      <div id="commentsSection">
        <p> The standard chunk of Lorem Ipsum used since the 1500s i </p>
      </div>
    </div>
  </div>

@if ( Auth::guard('web')->user())
  <!-- Add Article Section -->
  <div class="row mt-4" style="margin: 40px; padding-top: 20px;">
    <div class="col">
      <h3>{{ __('Add comment')}}</h3>
      <form action="{{ route('articles.store') }}" method="POST" id="newArticleForm">
        @csrf
        <div class="form-group">
          <label for="newArticleTitle">{{ __('Title')}}:</label>
          <input type="text" name="title" class="form-control" id="newArticleTitle" required>
        </div>
        <input type="hidden" name="article_id" value="{{  $article->id }}">
        <div class="form-group">
          <label for="newArticleContent">{{ __('The content')}}:</label>
          <textarea class="form-control" name="content" id="newArticleContent" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style=" background-color: darkgoldenrod">{{ __('Add')}}</button>
      </form>
    </div>
  </div>
@else
<div class="row mt-4" style="margin: 40px; padding-top: 20px;">
  <div class="col">
    <h3 class="text-danger">{{ __('Login to add a comment')}}</h3>
  </div>
</div>
@endif


</div>
</div>
@endsection