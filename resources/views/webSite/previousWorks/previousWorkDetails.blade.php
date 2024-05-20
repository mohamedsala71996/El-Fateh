@extends('layouts.site.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100%;">
  <img src="{{ asset('storage/' . $previousWork->image) }}" class="image">
</div>

   <style>
 
#mbody2{
  text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};

}
     </style>
<div class="col" >
<p id="mbody2" style="font-size: 50px;color: darkgoldenrod;margin:40px;">{{ $previousWork->{app()->getLocale().'_title'} }}</p>
  <p  id="mbody2" style=" font-size: large;font-weight: bold;margin:40px;" class="row">{{ $previousWork->{app()->getLocale().'_description'} }}</p>
  <ul  id="mbody2" class="list-unstyled" style="font-size: 16px;margin:40px;">
    <li><strong>{{ __('Client') }}:</strong> {{ $previousWork->{app()->getLocale().'_client'} }}</li>
    <li><strong>{{ __('Engineer name') }}:</strong> {{ $previousWork->{app()->getLocale().'_engineer_name'} }}</li>
    <li><strong>{{ __('Location') }}:</strong> {{ $previousWork->{app()->getLocale().'_location'} }}</li>
    <li><strong>{{ __('Started At') }}:</strong> {{ \Carbon\Carbon::parse($previousWork->started_at)->format('d/m/Y') }}</li>
    <li><strong>{{ __('Ended At') }}:</strong> {{ \Carbon\Carbon::parse($previousWork->ended_at)->format('d/m/Y') }}</li>
    @if (isset($previousWork->total_area))
    <li><strong>{{ __('Total Building Area') }}:</strong> {{ $previousWork->total_area }}</li>
    @endif
    @if (isset($previousWork->total_units))
    <li><strong>{{ __('Total Units') }}:</strong> {{ $previousWork->total_units }}</li>
    @endif
    @if (isset($previousWork->total_concrete))
    <li><strong>{{ __('Total Concrete') }}:</strong> {{ $previousWork->total_concrete }}</li>
    @endif
  </ul>

</div>



@endsection