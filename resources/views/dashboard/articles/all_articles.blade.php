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
          <li class="breadcrumb-item active" aria-current="page">All Articles</li>
        </ol>
      </div>
    </div>
    <!-- Add New Article Button -->
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('create_article') }}" class="btn btn-success">Add New Article</a>
      </div>
    </div>
    <!-- Cards to display articles -->
    <div class="row">
      @foreach($articles as $article)
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{ asset('dist/img/articles/' . $article->image) }}" alt="Article Image" class="card-img-top article-image" style="object-fit: cover; height: 200px;">
          <div class="card-body">
            <h5 class="card-title">{{ $article->ar_title }}</h5>
            <p class="card-text">{{ $article->ar_content }}</p>
            <a href="{{ route('edit_article', $article->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('delete_article', $article->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection