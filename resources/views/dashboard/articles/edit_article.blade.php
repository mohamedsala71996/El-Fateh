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
          <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
        </ol>
      </div>
    </div>
    <form method="POST" action="{{ route('update_article', $article->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="en_title" class="form-label">English Title</label>
        <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $article->en_title }}">
        @error('en_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_title" class="form-label">العنوان</label>
        <input type="text" class="form-control" id="ar_title" name="ar_title" value="{{ $article->ar_title }}">
        @error('ar_title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="en_content" class="form-label">English Content</label>
        <textarea class="form-control" id="en_content" name="en_content" rows="3">{{ $article->en_content }}</textarea>
        @error('en_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ar_content" class="form-label">الموضوع</label>
        <textarea class="form-control" id="ar_content" name="ar_content" rows="3">{{ $article->ar_content }}</textarea>
        @error('ar_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-row">
        <div class="col-12">
          <label for="image">Update image if you need</label>
          <input type="file" name="image" id="image" class="form-control">
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-4 mt-3">
          @if ($article->image)
          <div class="card">
            <img src="{{ asset('dist/img/articles/' . $article->image) }}" alt="Article Image" class="card-img-top article-image" style="object-fit: cover; height: 200px;">
            <div class="card-body">
              <h5 class="card-title">Article Image</h5>
            </div>
          </div>
          @else
          <div class="alert alert-warning">No image available</div>
          @endif
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</div>
<br>
<br>
<br>
@endsection