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
          <li class="breadcrumb-item active" aria-current="page">All Branches</li>
        </ol>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <a href="{{ route('branches.create') }}" class="btn btn-success">Add New Branch</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Branches List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th>Phone Number</th>
                  <th>Address (English)</th>
                  <th>Address (Arabic)</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($branches as $branch)
                <tr class="align-middle">
                  <td>{{ $branch->phone_number }}</td>
                  <td>{{ $branch->en_address }}</td>
                  <td>{{ $branch->ar_address }}</td>
                  <td>
                    <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">There are no branches available.</td>
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
