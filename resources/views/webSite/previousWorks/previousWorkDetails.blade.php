@extends('layouts.site.app')

@section('content')
<div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div  >
        <div >
          <img class="d-block w-100" src="{{ asset("storage/$previousWork->image") }}" >
        </div>
      </div>
    </div>
  
</div>
<div>
  <p class="word" style="margin: 40px;">{{ $previousWork->{app()->getLocale().'_title'} }}</p>
  <p style="text-align: right;  margin-top: 30px; font-size: large; padding-inline:70px ; font-weight: bold;">{{ $previousWork->{app()->getLocale().'_description'} }}</p>
<div  style="text-align: right; padding-right: 100px; font-size: larger;">
  <ul class="list-unstyled" style="font-size: 16px;">
    <li><strong>{{ __('Client') }}:</strong> {{ $previousWork->{app()->getLocale().'_client'} }}</li>
    <li><strong>{{ __('Engineer name') }}:</strong> {{ $previousWork->{app()->getLocale().'_engineer_name'} }}</li>
    <li><strong>{{ __('Location') }}:</strong> {{ $previousWork->{app()->getLocale().'_location'} }}</li>
    <li><strong>{{ __('Started At') }}:</strong> {{ \Carbon\Carbon::parse($previousWork->started_at)->format('d/m/Y') }}</li>
    <li><strong>{{ __('Ended At') }}:</strong> {{ \Carbon\Carbon::parse($previousWork->ended_at)->format('d/m/Y') }}</li>
    <li><strong>{{ __('Total Building Area') }}:</strong> {{ $previousWork->total_area }}</li>
    <li><strong>{{ __('Total Units') }}:</strong> {{ $previousWork->total_units }}</li>
    <li><strong>{{ __('Total Concrete') }}:</strong> {{ $previousWork->total_concrete }}</li>
  </ul>

</div>
</div> 

@endsection