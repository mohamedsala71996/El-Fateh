@extends('layouts.site.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @if (isset(\App\Models\MediaFile::first()->article_sliders))
          @foreach (json_decode(\App\Models\MediaFile::first()->article_sliders) as $key => $slider)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/'.$slider) }}" class="d-block w-100" alt="Slide {{ $key }}" style="object-fit: cover; height: 600px;">
          </div>
          @endforeach
          @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    @foreach ($articles as $article)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card h-100" style="border: 1px solid #000000; box-shadow: 0px 0px 10px 0px #0000000D;">
        <img src="{{ asset('dist/img/articles/' . $article->image) }}" class="card-img-top" alt="card image">
        <div class="card-body" style="text-align:center;">
          <h5>{{ $article->{app()->getLocale().'_title'} }}</h5>
          <p>{{ $article->{app()->getLocale().'_content'} }}</p>
          <div class="d-flex flex-column align-items-center">
            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary mt-2" style="background-color: darkgoldenrod;">{{ __('Take a look') }}</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
