@extends('layouts.site.app')

@section('content')
<div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div  >
        <div >
          <img class="d-block w-100" src="{{ asset("storage/$previousWork->image") }}" >
        </div>
      </div>
    </div>
  
</div>
<div>
  <p class="word" style="margin: 40px;">مشروع عماير العاشر من رمضان</p>
<p  style="text-align: right; padding-right: 100px; font-size: larger;">
  العميل: هيئة المجتمعات العمرانية الجديدة<br><br>
  الموقع: مدينة العاشر من رمضان<br><br>
  إجمالي مساحة البناء: 526,026 م2 <br><br>
  إجمالي عدد الوحدات: 1,940<br><br>
  إجمالي الخرسانة: 230,000 م3<br><br>
</p>
</div> 

@endsection