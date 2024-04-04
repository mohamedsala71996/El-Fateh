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
          <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
      </div>
    </div>
    <!-- Display About Us Data -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            About Us
          </div>
          <div class="card-body">
            <form method="POST" action="{{ isset($aboutUs) ? route('about-us.update', $aboutUs->id) : route('about-us.store') }}">
              @csrf
              @isset($aboutUs)
                @method('PUT')
              @endisset
              <div class="mb-3">
                <label for="ar_company_name" class="form-label">Company Name (Arabic)</label>
                <input type="text" class="form-control" id="ar_company_name" name="ar_company_name" value="{{ $aboutUs->ar_company_name ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="en_company_name" class="form-label">Company Name (English)</label>
                <input type="text" class="form-control" id="en_company_name" name="en_company_name" value="{{ $aboutUs->en_company_name ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="ar_location" class="form-label">Location (Arabic)</label>
                <input type="text" class="form-control" id="ar_location" name="ar_location" value="{{ $aboutUs->ar_location ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="en_location" class="form-label">Location (English)</label>
                <input type="text" class="form-control" id="en_location" name="en_location" value="{{ $aboutUs->en_location ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="ar_about_text" class="form-label">About Text (Arabic)</label>
                <textarea class="form-control" id="ar_about_text" name="ar_about_text">{{ $aboutUs->ar_about_text ?? '' }}</textarea>
              </div>
              <div class="mb-3">
                <label for="en_about_text" class="form-label">About Text (English)</label>
                <textarea class="form-control" id="en_about_text" name="en_about_text">{{ $aboutUs->en_about_text ?? '' }}</textarea>
              </div>
              <div class="mb-3">
                <label for="founded_date" class="form-label">Founded Date</label>
                <input type="date" class="form-control" id="founded_date" name="founded_date" value="{{ $aboutUs->founded_date ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ $aboutUs->website ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $aboutUs->contact_email ?? '' }}">
              </div>
              <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $aboutUs->phone_number ?? '' }}">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ isset($aboutUs) ? 'Update About Us' : 'Add About Us' }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
