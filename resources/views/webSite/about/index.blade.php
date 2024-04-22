@extends('layouts.site.app')

@section('content')
<div class="containere" style="padding-top: 9%">
    <!-- فيديو -->
    {{-- <div class="video-container">
        <!-- إضافة فيديو هنا -->
        <video autoplay loop muted style="width: 100%; height: 100%; object-fit: cover;">
            <source src="assets/video/veedeoabout.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
                </div> --}}
    <!-- معلومات الشركة -->
    <div class="info-container">
        <h2>{{ $aboutUs->{app()->getLocale().'_company_name'} }}</h2>
        <p>{{ $aboutUs->{app()->getLocale().'_about_text'} }}</p>
    </div>
</div>
@endsection