@extends('layouts.admin.app')

@section('content')
    <!-- Display success message -->
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
                        <li class="breadcrumb-item active" aria-current="page">All Perviouswork</li>
                    </ol>
                </div>
            </div>
            <!-- Add New Article Button -->
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ url('admin/PerviousWork') }}" class="btn btn-success">Add New Pervious Work</a>
                </div>
            </div>
            <!-- Cards to display articles -->
            <div class="row">
                @foreach($allperviousWorks as $allperviousWork)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset("storage/$allperviousWork->image") }}" class="card-img-top article-image" style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">{{$allperviousWork->en_title}}</h5>
                                <h5 class="card-title">Engineer/ {{$allperviousWork->en_engineer}}</h5>
                                <h6 class="card-text">Ended at / {{$allperviousWork->ended_at}}</h6>
                                <p class="card-text">{{$allperviousWork->en_description}}</p>
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{url('admin/edit/PerviousWork/'.$allperviousWork->id)}}"><button type="button" class="btn btn-secondary m-2">Edit</button></a>
                                    <form action="{{url("admin/delete/PerviousWork/$allperviousWork->id")}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
