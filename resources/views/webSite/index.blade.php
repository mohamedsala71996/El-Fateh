@extends('layouts.site.app')

@section('content')
        {{-- Start Body --}}
        <div class="container">
            <hr class="line">
            <p class="word">الفاتح</p>
        </div>
        <div class="card">
            <div class="card-content" >
                <div class="text-container">
                    <h5 class="card-title" style="margin-left: 40%; margin-bottom: 10%;">الديكورات الداخلية والخارجية</h5>
                    <p class="card-text" style="margin: 50px; font-size:large;">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل نشر النسخة النهائية.</p>
                    <a href="decor.html" class="btnn btn-primary">الق نظره</a>
                </div>
                <img src="{{ url('/') }}/assets/images/dec1.jpg" alt="صورة الكارت" class="card-img">
        </div>
        <div class="card-content" >
            <div class="text-container">
                <h5 class="card-title" style="margin-left: 40%; margin-bottom: 10%;">الديكورات الداخلية والخارجية</h5>
                <p class="card-text" style="margin: 50px; font-size:large;">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل نشر النسخة النهائية.</p>
                <a href="emara.html" class="btnn btn-primary">الق نظره</a>
            </div>
            <img src="{{ url('/') }}/assets/images/project1.jpg" alt="صورة الكارت" class="card-img">

    </div>
    <div class="card-content" >
        <div class="text-container" >
            <h5 class="card-title" style="margin-left: 40%; margin-bottom: 10%;">الديكورات الداخلية والخارجية</h5>
            <p class="card-text" style="margin: 50px; font-size:large;">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل نشر النسخة النهائية.</p>
            <a href="elec.html" class="btnn btn-primary">الق نظره</a>
        </div>
        <img src="{{ url('/') }}/assets/images/project2.jpg" alt="صورة الكارت" class="card-img">

    </div>
        <div class="card-content" >
            <div class="text-container">
                <h5 class="card-title" style="margin-left: 40%; margin-bottom: 10%;">الديكورات الداخلية والخارجية</h5>
                <p class="card-text" style="margin: 50px; font-size:large;">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل نشر النسخة النهائية.</p>
                <a href="mecanec.html" class="btnn btn-primary">الق نظره</a>
            </div>
            <img src="{{ url('/') }}/assets/images/project3.jpg" alt="صورة الكارت" class="card-img">
    </div>
</div>
{{-- End Body --}}

@endsection