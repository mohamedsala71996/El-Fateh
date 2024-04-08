@extends('layouts.site.app')

@section('content')
<div class="container">
  <hr class="lineelec">
  <p class="word">الاعمال السابقة</p>
</div> 

@foreach ($previousWorks as $previousWork)
<div class="content" style="padding-top:20px ;">
  <div class="dec">
   <img src="{{ asset("storage/$previousWork->image") }}"  class="image">
   <p style="text-align: right;  margin-top: 30px; font-size: large; padding-inline:70px ; font-weight: bold;">لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل نشر النسخة النهائية</p>
   <a href="{{ route('previousWork', $previousWork->id) }}" class="button" style="margin-right: 30%; margin-top: 50px;"> الق نظره</a></div> 
 </div>
 
@endforeach


@endsection