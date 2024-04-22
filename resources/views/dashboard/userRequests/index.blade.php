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
          <li class="breadcrumb-item active" aria-current="page">All contactRequests</li>
        </ol>
      </div>
    </div>
    <!-- Add New Category Button -->
{{--    <div class="row mb-3">--}}
{{--      <div class="col">--}}
{{--        <a href="{{ route('contactRequests.create') }}" class="btn btn-success">Add New Category</a>--}}
{{--      </div>--}}
{{--    </div>--}}
    <!-- Table to display contactRequests -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Contact Requests List
          </div>
          <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>governorate</th>
                        <th>City</th>
                        <th>Detailed Address</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contactRequests as $contactRequest)
                    <tr class="align-middle">
                        <td>{{ $contactRequest->name }}</td>
                        <td>{{ $contactRequest->phone_number }}</td>
                        <td>{{ $contactRequest->governorate }}</td>
                        <td>{{ $contactRequest->city }}</td>
                        <td>{{ $contactRequest->detailed_address }}</td>
                        <td>{{ $contactRequest->description }}</td>
                        <td>
                            <form action="{{ route('contactRequest.destroy',$contactRequest->id) }}" method="POST" style="display: inline-block; margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
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
