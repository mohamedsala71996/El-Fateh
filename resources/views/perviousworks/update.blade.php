@extends('layouts.admin.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pervious Work</li>
                    </ol>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <a href="{{ url('admin/AllperviousWorks') }}" class="btn btn-success">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Pervious Work</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/update/PerviousWork/'.$Perviouswork->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" @error('en_title') is-invalid @enderror
                                        value="{{ $Perviouswork->en_title }}" name="en_title">
                                    @error('en_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">العنوان</label>
                                    <input type="text" class="form-control" @error('ar_title') is-invalid @enderror
                                        value="{{ $Perviouswork->ar_title }}" name="ar_title">
                                    @error('ar_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="engineer" class="form-label">Engineer</label>
                                    <input type="text" class="form-control" @error('en_engineer') is-invalid @enderror
                                        value="{{ $Perviouswork->en_engineer }}" name="en_engineer">
                                    @error('en_engineer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="engineer" class="form-label">المهندس</label>
                                    <input type="text" class="form-control" @error('ar_engineer') is-invalid @enderror
                                        value="{{ $Perviouswork->ar_engineer }}" name="ar_engineer">
                                    @error('ar_engineer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="starts_at" class="form-label">Start at</label>
                                    <input type="date" class="form-control" @error('starts_at') is-invalid @enderror
                                        value="{{ $Perviouswork->starts_at }}" name="starts_at">
                                    @error('starts_at')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ended_at" class="form-label">End at</label>
                                    <input type="date" class="form-control" @error('ended_at') is-invalid @enderror
                                        value="{{ $Perviouswork->ended_at }}" name="ended_at">
                                    @error('ended_at')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="en_description" class="form-label">Description</label>
                                    <textarea class="form-control" @error('en_description') is-invalid @enderror name="en_description" rows="3"> {{ $Perviouswork->en_description }}</textarea>
                                    @error('en_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ar_description" class="form-label">نبذة عن المشروع</label>
                                    <textarea class="form-control" @error('ar_description') is-invalid @enderror name="ar_description" rows="3"> {{ $Perviouswork->ar_description }}</textarea>
                                    @error('ar_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="Category" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" >
                                        @foreach ($categories as $category)
                                            <option value="{{ $Perviouswork->category->id }}">{{ $Perviouswork->category->en_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" @error('image') is-invalid @enderror name="image">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{asset("storage/$Perviouswork->image")}}" width="100px" alt="" srcset="">
                                </div>

                                <button type="submit" class="btn btn-warning m-2">Edit The Work</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
