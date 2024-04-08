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
          <li class="breadcrumb-item active" aria-current="page">Why Us</li>
        </ol>
      </div>
    </div>
    <div >
        <div >
            <div>
                <div class="card">
                    <div class="card-header">{{ __('Edit Why Us Entry') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('reasons.update', $reason->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-4">
                                <label for="ar_title">{{ __('Title (Arabic)') }}</label>
                                <input id="ar_title" type="text" class="form-control @error('ar_title') is-invalid @enderror" name="ar_title" value="{{ old('ar_title', $reason->ar_title) }}" required autocomplete="ar_title" autofocus>
    
                                @error('ar_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="en_title">{{ __('Title (English)') }}</label>
                                <input id="en_title" type="text" class="form-control @error('en_title') is-invalid @enderror" name="en_title" value="{{ old('en_title', $reason->en_title) }}" required autocomplete="en_title">
    
                                @error('en_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="ar_content">{{ __('Content (Arabic)') }}</label>
                                <textarea id="ar_content" class="form-control @error('ar_content') is-invalid @enderror" name="ar_content" required>{{ old('ar_content', $reason->ar_content) }}</textarea>
    
                                @error('ar_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
                            <div class="form-group mb-4">
                                <label for="en_content">{{ __('Content (English)') }}</label>
                                <textarea id="en_content" class="form-control @error('en_content') is-invalid @enderror" name="en_content" required>{{ old('en_content', $reason->en_content) }}</textarea>
    
                                @error('en_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Entry') }}
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
