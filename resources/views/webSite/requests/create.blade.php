@extends('layouts.site.app')
@section('content')
<style>
          #mbody1{   
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

        @if (Auth::guard('web')->user())
            <!-- Add Article Section -->
            <div class="row mt-4" style="margin: 40px; padding-top: 20px;">
                <div class="col">
                    <h3>{{ __('Send request') }}</h3>
                    <form action="{{ route('requestUser.store') }}" method="POST" id="newRequestForm">
                        @csrf
                        <div class="form-group">
                            <label for="newRequestName">{{ __('Name') }}:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="newRequestName" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newRequestPhoneNumber">{{ __('Phone number') }}:</label>
                            <input type="text" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" id="newRequestPhoneNumber"
                                value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newRequestGovernorate">{{ __('Governorate') }}:</label>
                            <input type="text" name="governorate"
                                class="form-control @error('governorate') is-invalid @enderror" id="newRequestGovernorate"
                                value="{{ old('governorate') }}">
                            @error('governorate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newRequestCity">{{ __('City') }}:</label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                id="newRequestCity" value="{{ old('city') }}">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newRequestDetailedAddress">{{ __('Detailed Address') }}:</label>
                            <textarea class="form-control @error('detailed_address') is-invalid @enderror" name="detailed_address"
                                id="newRequestDetailedAddress" rows="3">{{ old('detailed_address') }}</textarea>
                            @error('detailed_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newRequestDescription">{{ __('Description') }}:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="newRequestDescription"
                                rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: darkgoldenrod">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row mt-4" style="margin: 40px; padding-top: 20px;">
                <div class="col">
                    <h3 class="text-danger">{{ __('Login to send a request') }}</h3>
                </div>
            </div>
        @endif


    </div>
    </div>
@endsection
