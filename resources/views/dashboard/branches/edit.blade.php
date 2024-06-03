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
          <li class="breadcrumb-item active" aria-current="page">Edit Branch</li>
        </ol>
      </div>
    </div>
    <div>
      <div>
        <div>
          <div class="card">
            <div class="card-header">{{ __('Edit Branch') }}</div>
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
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Update Branch') }}
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
