@extends('layouts.site.app')

@section('content')
{{-- <div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" id="background-div">
        <img class="d-block w-100" src="assets/images/Articles2.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="assets/images/Articles3.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="assets/images/Articles1.jpg" alt="Third slide">
      </div>
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

</div> --}}
<div data-wow-duration="3s" data-wow-delay="0.7s" id="box2">
  <div class="container">
    <div class="cards m-auto gap-4 row" style="align-items: center; justify-content: center; ">
      @foreach ($articles as $article)
      <div class="cards  col-lg-5 col-md-6 col-12" style="width: 20rem; margin: 10px; border: 1px solid #000000 !important;
      box-shadow: 0px 0px 10px 0px #0000000D !important;">
        <img src="{{ asset('dist/img/articles/' . $article->image) }}" class="card-img-top" style="height: 300px; padding-top:10px ;"
          alt="card image">
        <div class="card-body">
          <h5>{{ $article->{app()->getLocale().'_title'} }}</h3>
          <p class="card-text">{{ $article->{app()->getLocale().'_content'} }}</p>
          <div class="d-flex flex-column align-items-center" id="app">
            <a href="{{ route('articles.show',$article->id) }}" class="btn btn-primary w-30 mt-2 "
              style="background-color: darkgoldenrod; outline: none;  border: none;">{{ __('Take a look') }}</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection