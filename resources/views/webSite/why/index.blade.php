@extends('layouts.site.app')

@section('content')
<div class="container">
    <hr class="line">
    <p class="word" data-ar="{{ __('Our services') }}" data-en="Our services">{{ __('Our services') }}</p>

</div>
@foreach ($reasons as $reason)
<div style="padding: 20px;">
    <div style="margin: 15px;">
        <h1 style=" large; text-align: right; margin: 20px; color: darkgoldenrod;">{{ $reason->{app()->getLocale().'_title'} }}</h2>
        <p style="font-size: large; text-align: right; margin: 20px;">{{ $reason->{app()->getLocale().'_content'} }}</p>
    </div>     
@endforeach
{{-- <div style="margin: 15px;">
    <a href="decor.html">
        <h2 style="font-size: large; text-align: right; margin: 20px; color: darkgoldenrod;">التصميم الديكوري 
        </h2>
    </a>
    <p style="font-size: large; text-align: right; margin: 20px;">
        عمل على جميع الطرز الديكورية بدءاً من الكلاسيكى وحتى الحديث عالى التقنية حيث نقوم بأعمال التصميم الداخلى
        للفراغات لتناسب ذوق العميل ومتطلبات راحته اليومية وكذلك الوظيفية فنحن معنيون أيضاً بديكور المبانى
        الإدارية والمبانى العامة والتى تتطلب الجمال والوظيفية فى نفس الوقت
        و يقدم القسم للفراغات المصممة ما يلى من مخططات:
        مخططات للأرضيات
        مخططات للأسقف و الإنارة
        مخططات للحوائط
        مخططات للفرش
        مناظير توضيحية للفراغ بعد التصميم الديكورى له
        نسعى دائماً للوصول إلى أدق التفاصيل حتى لا نرهق عميلنا فى أى مراجعة للمكتب بالتفاصيل أثناء التنفيذ.</p>
</div>
<div style="margin: 15px;">
    <h2 style="font-size: large; text-align: right; margin: 20px;">حساب الكميات </h2>
    <p style="font-size: large; text-align: right; margin: 20px;">نقوم بأعمال حساب الكميات واشتراطات ومواصفات
        المواد
        كما نقدم خدمة تجهيز مستندات الطرح الفنية للمشاريع
        ونقدم تلك الخدمة لجميع عملائنا من شركات أو مكاتب متخصصة أو للأفراد
        وتقدم تلك الخدمة فى التخصصات التصميمية الآتية:<br>
        <a href="emara.html" style="color: darkgoldenrod;">للأعمال المعمارية</a><br>
        <a href="emara.html" style="color: darkgoldenrod;"> للأعمال الإنشائية </a><br>
        <a href="mecanec.html" style="color: darkgoldenrod;"> للأعمال الإليكتروميكانيكية </a><br>
        <a href="decor.html" style="color: darkgoldenrod;"> الأعمال الديكورية </a> <br>
        وتعتبر كراسة الشروط والمواصفات وما تتضمنه من كميات للبنود كدستور تعاقد بين المالك والمقاول كما تسمح
        للمالك بتقديم التسعير بين أكثر من مقاول بنفس المستوي المحدد دون القلق من مواصفات المواد التى يستخدمها
        مقاول عن آخر، كما أن تقييم المشروع من حيث كمياته وتفاصيله يتيح للمالك معرفة الكميات التى يجب أن يقوم
        بشرائها فى كل شىء له علاقة بمشروعه وبهذه الطريقة يستطيع معرفة إجمالى التكلفة الكلية للمشروع وكيفية
        تنظيمه له .تبعاً لإمكانياته وذلك بناءاً على كل من الأعمال سابقة الذكر بالأعلى.
    </p>
</div> --}}
</div>
@endsection