@extends('layouts.site.app')
@section('content')
<style>
    #mbody1 {   
        direction: {{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }};
        text-align: {{ app()->getLocale() == 'en' ? 'left' : 'right' }};
    }
</style>
<div class="col" id="mbody1">

    <div class="col" id="mbody1">
<br>
<br>
    <h1 style="color: darkgoldenrod;" id="mbody1" data-ar="{{ __('Branches') }}" data-en="Branches">{{ __('Branches') }}</h1>
</div>
    <div class="row">
        @foreach($branches as $branch)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            <span style="color: darkgoldenrod; font-weight:bold;">{{ __('Address') }}:</span> {{ $branch->{app()->getLocale() . '_address' } }}
                        </p>
                        @foreach ($branch->phoneNumbers as $number)
                        <p class="card-text"><i style="color: darkgoldenrod;" class="
                            {{ 
                                ($number->en_title == 'whatsapp') ? 'fab fa-whatsapp' : 
                                (($number->en_title == 'telegram') ? 'fab fa-telegram-plane' : 'fas fa-phone') 
                            }}">
                        </i> <span style="color: darkgoldenrod;font-weight:bold;">{{ $number->{app()->getLocale() . '_title'} }}:</span> {{ $number->phone_number }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
