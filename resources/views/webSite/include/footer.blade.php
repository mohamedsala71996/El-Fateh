<!--Start Footer-->
<footer style="background-color:black; color: darkgoldenrod; padding: 70px; margin-top: 30px;">
  <div class="container">
    <div class="row justify-content-center w-100">
      <!-- Social Media Section -->
      <section class="col-md-6 col-12 align-self-center">
        <h1  href="#">
        @php
           $aboutUs=\App\Models\AboutUs::first();
        @endphp
          <span style="color: darkgoldenrod; font-weight: bold;">{{ $aboutUs->{app()->getLocale() . '_company_name'} ??  __('El-Fateh') }}</span>
        </h1>
        <p style="font-family: Poppins; font-size: 15px; font-weight: 400; line-height: 23px; text-align: left;">
          <a href="mailto:{{ \App\Models\ContactUs::first()->email ?? '' }}" style="color: darkgoldenrod;text-decoration: underline">
              <i class="fas fa-envelope" style="color: darkgoldenrod;"></i> 
              {{ \App\Models\ContactUs::first()->email ?? '' }}
          </a>
      </p>
        <div class="font-asm d-flex" style="margin-top: 40px">
          @php
              $socialLinks=\App\Models\SocialMedia::get();
          @endphp
          @foreach($socialLinks as $link)
            <a href="{{ $link->url }}" target="_blank" style="padding: 10px; color: darkgoldenrod;">
              @if($link->platform == 'twitter')
                <i class="fa-brands fa-twitter fa-lg"></i>
              @elseif($link->platform == 'linkedIn')
                <i class="fa-brands fa-linkedin-in fa-lg"></i>
              @elseif($link->platform == 'facebook')
                <i class="fa-brands fa-facebook fa-lg"></i>
              @elseif($link->platform == 'instagram')
                <i class="fa-brands fa-instagram fa-lg"></i>
              @elseif($link->platform == 'youTube')
                <i class="fa-brands fa-youtube fa-lg"></i>
              @endif
            </a>
          @endforeach
        </div>
      </section>
      <!-- Contact Us Section -->
      <section class="col-md-6 col-12 align-self-center">
        <h1 style="font-family: Poppins; font-size: 24px; font-weight: 600; line-height: 36px; text-align: left;">
            {{ __('Contact us') }}
        </h1>
        <p style="font-family: Poppins; font-size: 15px; font-weight: 400; line-height: 23px; text-align: left;">
            {{ __('Address') }}: {{ (\App\Models\ContactUs::first()->{app()->getLocale() . '_address' } ?? '') }}
        </p>
        @foreach (\App\Models\ContactUs::first()->phoneNumbers as $number)
        <p style="font-family: Poppins;
            font-size: 15px;
            font-weight: 400;
            line-height: 23px;
            letter-spacing: 0em;
            text-align: left;
            ">
            @if($number->en_title == 'whatsapp')
                <a href="https://api.whatsapp.com/send?phone={{ $number->phone_number }}" target="_blank" style="color:darkgoldenrod;text-decoration: underline">
                    <i class="fab fa-whatsapp"></i> {{ $number->{app()->getLocale() . '_title'} }}: {{ $number->phone_number }}
                </a>
            @elseif($number->en_title == 'telegram')
                <a href="https://t.me/{{ $number->phone_number }}" target="_blank" style="color:darkgoldenrod;text-decoration: underline">
                    <i class="fab fa-telegram-plane"></i> {{ $number->{app()->getLocale() . '_title'} }}: {{ $number->phone_number }}
                </a>
            @else
                <i class="fas fa-phone"></i> {{ $number->{app()->getLocale() . '_title'} }}: {{ $number->phone_number }}
            @endif
        </p>
        @endforeach
    </section>
    

    </div>
            {{-- <h4 >
          <a href="{{ route('web_branches.index') }}" target="_blank" style="color: darkgoldenrod; font-weight: bold">
            {{ __('Branches')  }} <i class="fa-solid fa-arrow-right"></i>
          </a>
        </h4> --}}
  </div>
  
</footer>

<!--End Footer-->


