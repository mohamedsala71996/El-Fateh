<!-- start Header -->
<div data-wow-duration="2s" data-wow-delay="0.5s" class="navbar navbar-expand-lg  position-fixed w-100 top-0" style=" z-index: 100;box-shadow: 0px 4px 8px 0px darkgoldenrod;" id="box1">
        <a class="navbar-brand" style="color: darkgoldenrod; font-size: xx-large;" href="#" >EL-fateh </a>
        <button class="nav-link btn" >
            <img  src="{{ url('/') }}/assets/images/eng.png" style="width: 20px; background-color:darkgoldenrod;border-radius: 5px;" alt="الوضع الفاتح">
        </button>
                <button class="nav-link btn" id="dark-mode-toggle">
                    <img class="al" src="{{ url('/') }}/assets/images/light-mode.png" style="width: 20px; background-color:darkgoldenrod;border-radius: 5px;" alt="الوضع الفاتح">
                </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: aliceblue;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="margin-right: 40px;" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="padding-right: 20px;">
                <li class="nav-item" style="margin: 20px;">
                    <a class="nav-link" href="" style="margin: 10; color: darkgoldenrod;" > Community</a>
                </li>
                <li class="nav-item" style="margin: 20px;">
                    <a class="nav-link" href="" style="margin: 10; color: darkgoldenrod;" > Requests</a>
                </li>
                <li class="nav-item" style="margin: 20px;">
                    <a class="nav-link" href="{{ route('whyUs.index') }}" style="color: darkgoldenrod;" >Why Us</a>
                </li>
                <li class="nav-item" style="margin: 20px;">
                    <a class="nav-link" href="{{ route('about.index') }}" style="color: darkgoldenrod;" >About</a>
                </li>
                <li class="nav-item" style="margin: 20px;">
                    <img src="{{ url('/') }}/assets/images/logo.jpeg" id="navbar-brand" style="position: relative; width:40px"  alt="">
                </li>
                @if (auth()->guard('web')->check())
                    
                            <!-- Logout Button -->
            <li class="nav-item" style="margin: 20px;">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn bg-secondary text-light text-uppercase rounded-2">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <!-- End Logout Button -->
            @else
            <li class="nav-item" style="margin: 20px;">
                <a href="{{ route('login.user') }}" class="btn bg-secondary text-light text-uppercase rounded-2">Login</a>
            </li>
            @endif

            </ul>
        </div>
    </div>
    
    <div data-wow-duration="3s" data-wow-delay="0.7s" style="padding:10px;" id="box2">
        <video  autoplay muted loop style="width:100%">
            <source src="{{ url('/') }}/assets/video/videointo.mp4" type="video/mp4">
        </video>
    </div>
  <!-- End Header -->