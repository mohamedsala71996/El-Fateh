@extends('layouts.site.app')

@section('content')
    <div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
        <video autoplay muted loop style="width:100%">
            <source src="{{ url('/') }}/assets/video/videointo.mp4" type="video/mp4">
        </video>
    </div>
    {{-- Start Body --}}
    <div class="container">
        <hr class="line">
        <p class="word">الفاتح</p>
    </div>
    @foreach ($categories as $category)
        <div class="card">
            <div class="card-content">
                <div class="text-container">
                    <h5 class="card-title" style="margin-left: 40%; margin-bottom: 10%;">الديكورات الداخلية والخارجية</h5>
                    <p class="card-text" style="margin: 50px; font-size:large;">لوريم إيبسوم طريقة لكتابة النصوص في النشر
                        والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي
                        معنى. يمكن استخدام لوريم إيبسوم قبل نشر النسخة النهائية.</p>
                    <a href="{{ route('allPreviousWorks', $category->id) }}" class="btnn btn-primary">الق نظره</a>
                </div>
                <img src="{{ asset("storage/$category->photo") }}" class="card-img">
            </div>
        </div>
    @endforeach


    </div>
    {{-- End Body --}}
@endsection
