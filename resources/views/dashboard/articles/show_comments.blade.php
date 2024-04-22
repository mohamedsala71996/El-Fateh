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
          <li class="breadcrumb-item active" aria-current="page">All comments</li>
        </ol>
      </div>
    </div>

    <!-- Table to display comments -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Comments List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>User name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                    <tr class="align-middle">
                        <td>{{ $comment->title }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->user->first_name.' '.$comment->user->last_name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center" >There is no data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
