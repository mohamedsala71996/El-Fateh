@extends('layouts.site.app')

@section('content')
<div class="col">
  <p style="  margin-top: 30px; " class="word" class="row">{{ __('Previous works') }}</p>

@foreach ($previousWorks as $previousWork)
<div class="content" style="padding-top:20px ;">
  <div class="dec">
   <img src="{{ asset("storage/$previousWork->image") }}"  class="image">
   <h3 class="col" style="text-align: center;">{{ $previousWork->{app()->getLocale().'_title'} }}</h5>
   <p style="  margin-top: 30px; font-size: large; padding-inline:70px ; font-weight: bold;">{{ $previousWork->{app()->getLocale().'_description'} }}</p>
   <div><a href="{{ route('previousWork', $previousWork->id) }}" class="قخص button" style="margin-top: 50px; background-color: darkgoldenrod;
    color: white;
    border: none;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin-top: 20px;
    cursor: pointer;
    border-radius: 5px;"> {{ __('Take a look') }}</a></div> 
 </div>
  </div>
  </div>

 
@endforeach


@endsection