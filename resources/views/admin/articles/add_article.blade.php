@extends('layouts.admin.app')

@section('content')
<!-- desplay success message -->
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
          <li class="breadcrumb-item active" aria-current="page">Add Articles</li>
        </ol>
      </div>
    </div>
    <form method="POST" action="{{ route('store_article') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="en_title" class="form-label">English Title</label>
        <input type="text" class="form-control" id="en_title" name="en_title" value="{{ old('en_title') }}">
        @error('en_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_title" class="form-label">العنوان</label>
        <input type="text" class="form-control" id="ar_title" name="ar_title" value="{{ old('ar_title') }}">
        @error('ar_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="en_content" class="form-label">English Content</label>
        <textarea class="form-control" id="en_content" name="en_content" rows="3">{{ old('en_content') }}</textarea>
        @error('en_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_content" class="form-label">الموضوع</label>
        <p contenteditable="true" id="ar_content" name="ar_content">{{ old('ar_content') }}</p>
        @error('ar_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      @if ($errors->has('general'))
      <div class="alert alert-danger">{{ $errors->first('general') }}</div>
      @endif
      <div class="form-row">
        <div class="col-12">
          <label for="image">Img</label>
          <input type="file" name="image" id="image" class="form-control">
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</div>
@endsection