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
                            {{ __('Address') }}: {{ $branch->{app()->getLocale() . '_address' } }}
                        </p>
                        <p class="card-text">{{ __('Phone number') }}: {{ $branch->phone_number }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
