@extends('layouts.admin.app')
@section('content') 
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
  <div class="container-fluid">
    <div class="row g-3 mb-3 align-items-center">
      <div class="col">
        <ol class="breadcrumb bg-transparent mb-0">
          <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
        </div>
      </div> 
    <div class="row align-items-center">
  <div class="col">
    <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, {{ Auth::guard('admin')->user()->first_name }}!</h1>
</div>
@endsection