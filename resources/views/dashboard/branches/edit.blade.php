@extends('layouts.admin.app')
@section('content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a></li>
          @if ($mainBranch->id == $branch->id)
          <li class="breadcrumb-item active" aria-current="page">Edit Main Branch</li>
          @else
          <li class="breadcrumb-item active" aria-current="page">Edit Branch</li>
          @endif
        </ol>
      </div>
    </div>
    <div>
      <div>
        <div>
          <div class="card">
            @if ($mainBranch->id == $branch->id)
            <div class="card-header">{{ __('Edit Main Branch') }}</div>
            @else
            <div class="card-header">{{ __('Edit Branch') }}</div>
            @endif
            <div class="card-body">
              <form method="POST" action="{{ route('branches.update', $branch->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                  <label for="en_name">{{ __('Branch Name (English)') }}</label>
                  <input id="en_name" type="text" class="form-control @error('en_name') is-invalid @enderror" name="en_name" value="{{ old('en_name', $branch->en_name) }}" required autocomplete="en_name" autofocus>
                  @error('en_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="ar_name">{{ __('Branch Name (Arabic)') }}</label>
                  <input id="ar_name" type="text" class="form-control @error('ar_name') is-invalid @enderror" name="ar_name" value="{{ old('ar_name', $branch->ar_name) }}" required autocomplete="ar_name" autofocus>
                  @error('ar_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="en_address">{{ __('Address (English)') }}</label>
                  <textarea id="en_address" class="form-control @error('en_address') is-invalid @enderror" name="en_address" required>{{ old('en_address', $branch->en_address) }}</textarea>
                  @error('en_address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="ar_address">{{ __('Address (Arabic)') }}</label>
                  <textarea id="ar_address" class="form-control @error('ar_address') is-invalid @enderror" name="ar_address" required>{{ old('ar_address', $branch->ar_address) }}</textarea>
                  @error('ar_address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group mb-4">
                  <label>{{ __('Phone Numbers') }}</label>
                  <div id="phoneNumbersContainer">
                    @foreach($branch->phoneNumbers as $phoneNumber)
                    <div class="phone-number-row mb-2">
                      <input type="hidden" name="phone_numbers[{{ $loop->index }}][id]" value="{{ $phoneNumber->id }}">
                      <input type="text" name="phone_numbers[{{ $loop->index }}][en_title]" class="form-control d-inline-block mb-1" value="{{ old('phone_numbers.' . $loop->index . '.en_title', $phoneNumber->en_title) }}" placeholder="English Title">
                      <input type="text" name="phone_numbers[{{ $loop->index }}][ar_title]" class="form-control d-inline-block mb-1" value="{{ old('phone_numbers.' . $loop->index . '.ar_title', $phoneNumber->ar_title) }}" placeholder="Arabic Title">
                      <input type="text" name="phone_numbers[{{ $loop->index }}][phone_number]" class="form-control d-inline-block" value="{{ old('phone_numbers.' . $loop->index . '.phone_number', $phoneNumber->phone_number) }}" placeholder="Phone Number">
                      <button type="button" class="btn btn-danger btn-sm remove-phone-number">Remove</button>
                    </div>
                    @endforeach
                  </div>
                  <button type="button" class="btn btn-success btn-sm" id="addPhoneNumber">Add Phone Number</button>
                </div>

                <div id="map" style="height: 500px;width: 1000px;"></div>
                <input type="hidden" name="latitude" value="{{ old('latitude', $branch->latitude) }}" id="latitude">
                <input type="hidden" name="longitude" value="{{ old('longitude', $branch->longitude) }}" id="longitude">
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    @if ($mainBranch->id == $branch->id)
                    {{ __('Update Main Branch') }}
                    @else
                    {{ __('Update Branch') }}
                    @endif
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: {{ $branch->latitude }}, lng: {{ $branch->longitude }} },
      zoom: 13,
      mapTypeId: 'roadmap'
    });

    var marker = new google.maps.Marker({
      position: { lat: {{ $branch->latitude }}, lng: {{ $branch->longitude }} },
      map: map,
      title: 'Drag me!',
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function(event) {
      document.getElementById("latitude").value = this.getPosition().lat();
      document.getElementById("longitude").value = this.getPosition().lng();
    });
  }

  function handleLocationError(browserHasGeolocation, pos) {
    var content = browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.';
    var options = {
      map: map,
      position: pos,
      content: content
    };
    var infowindow = new google.maps.InfoWindow(options);
    map.setCenter(pos);
  }

  document.addEventListener('DOMContentLoaded', function() {
    var phoneNumbersContainer = document.getElementById('phoneNumbersContainer');
    var addPhoneNumberButton = document.getElementById('addPhoneNumber');

    addPhoneNumberButton.addEventListener('click', function() {
      var newIndex = phoneNumbersContainer.children.length;
      var newPhoneNumberRow = document.createElement('div');
      newPhoneNumberRow.classList.add('phone-number-row', 'mb-2');
      newPhoneNumberRow.innerHTML = `
        <input type="text" name="phone_numbers[${newIndex}][en_title]" class="form-control d-inline-block mb-1" placeholder="English Title">
        <input type="text" name="phone_numbers[${newIndex}][ar_title]" class="form-control d-inline-block mb-1" placeholder="Arabic Title">
        <input type="text" name="phone_numbers[${newIndex}][phone_number]" class="form-control d-inline-block" placeholder="Phone Number">
        <button type="button" class="btn btn-danger btn-sm remove-phone-number">Remove</button>
      `;
      phoneNumbersContainer.appendChild(newPhoneNumberRow);
    });

    phoneNumbersContainer.addEventListener('click', function(e) {
      if (e.target.classList.contains('remove-phone-number')) {
        e.target.parentElement.remove();
      }
    });
  });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc4op2z5AnCNM5hgYKl5M4mDsV_rILD4Y&libraries=places&callback=initAutocomplete&language=ar&region=EG" async defer></script>
@endsection
