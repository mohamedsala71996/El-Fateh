<!--Start Footer-->
<footer data-wow-duration="2s" data-wow-delay="0.4s"
  style="background-color:black; color: darkgoldenrod; padding: 70px; margin-top: 30px;">
  <div class="row justify-content-center w-100">
    <section style="margin-bottom:30px ;" class="col-md-4 col-12 align-self-center">
      <h1 class="navbar-brand fs-1" href="#"><span style="color: darkgoldenrod; font-weight: bold;">{{ __('EL-fateh')
          }}</span></h1>
      <div class="font-asm d-flex" style="margin-top: 40px">
        <i class="fa-brands fa-twitter fa-lg " style="padding: 10px;"></i>
        <i class="fa-brands fa-linkedin-in fa-lg ms-2" style="padding: 10px;"></i>
        <i class="fa-brands fa-facebook fa-lg ms-2" style="padding: 10px;"></i>
        <i class="fa-brands fa-instagram fa-lg ms-2 " style="padding: 10px;"></i>
      </div>
    </section>
    <section class="col-md-4 col-12 align-self-center">
      <h1 style="font-family: Poppins;
        font-size: 24px;
        font-weight: 600;
        line-height: 36px;
        letter-spacing: 0em;
        text-align: left;
        ">
        {{ __('Contact us') }}</h1>
      <p style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">
      </p>
      <p style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">
        {{ __('Address') }}: {{ (\App\Models\ContactUs::first()->{app()->getLocale() . '_address' } ?? '') }}</p>
      <p style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">
        {{ __('Phone number') }}: {{ (\App\Models\ContactUs::first()->phone_number ?? '') }}</p>
    </section>
  </div>
</footer>
<!--End Footer-->