@extends('layouts.site.app')

@section('content')
<div class="container">
  <hr class="lineelec">
  <p class="word">الاعمال السابقة</p>
</div> 

@foreach ($previousWorks as $previousWork)
<div class="content" style="padding-top:20px ;">
  <div class="dec">
   <img src="{{ asset("storage/$previousWork->image") }}"  class="image">
   <h3 >{{ $previousWork->{app()->getLocale().'_title'} }}</h5>
   <p style="text-align: right;  margin-top: 30px; font-size: large; padding-inline:70px ; font-weight: bold;">{{ $previousWork->{app()->getLocale().'_description'} }}</p>
   <a href="{{ route('previousWork', $previousWork->id) }}" class="button" style="margin-right: 30%; margin-top: 50px;"> {{ __('Take a look') }}</a></div> 
 </div>
 
@endforeach


@endsection