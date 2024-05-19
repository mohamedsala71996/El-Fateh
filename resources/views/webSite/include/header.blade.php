<!-- start Header -->
<div data-wow-duration="2s" data-wow-delay="0.5s" class="navbar navbar-expand-lg  position-fixed w-100 top-0" style=" z-index: 100;box-shadow: 0px 4px 8px 0px darkgoldenrod;" id="box1">
    <a class="navbar-brand" style="color: darkgoldenrod; font-size: xx-large;" href="{{ route('website') }}" >{{ __('EL-fateh') }}</a>
    <div class="nav-link btn" style="margin-right: auto;">
        <a href="{{ route('localeChange','ar') }}" style="color: darkgoldenrod; text-decoration: none; margin-right: 10px;">{{ __('Arabic') }}</a>
        <a href="{{ route('localeChange','en') }}" style="color: darkgoldenrod; text-decoration: none;">{{ __('English') }}</a>
    </div>
    <!--<button class="nav-link btn" id="dark-mode-toggle">-->
    <!--    <img class="al" src="{{ url('/') }}/assets/images/light-mode.png" style="width: 20px; background-color:darkgoldenrod;border-radius: 5px;" alt="{{ __('Light Mode') }}">-->
    <!--</button>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="background-color: aliceblue;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-right: 40px;" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" style="padding-right: 20px;">
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('articles.index') }}" style="margin: 10; color: darkgoldenrod;" >{{ __('Articles') }}</a>
            </li>
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('requestUser.index') }}" style="margin: 10; color: darkgoldenrod;" >{{ __('Requests') }}</a>
            </li>
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('whyUs.index') }}" style="color: darkgoldenrod;" >{{ __('Why Us') }}</a>
            </li>
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('about.index') }}" style="color: darkgoldenrod;" >{{ __('About') }}</a>
            </li>
            <li class="nav-item" style="margin: 20px;">
                <img src="{{ url('/') }}/assets/images/logo.jpeg" id="navbar-brand" style="position: relative; width:40px"  alt="">
            </li>
            @if (auth()->guard('web')->check())
                <li class="nav-item" style="margin: 20px;">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn bg-secondary text-light text-uppercase rounded-2">{{ __('Sign out') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item" style="margin: 20px;">
                    <a href="{{ route('login.user') }}" class="btn bg-secondary text-light text-uppercase rounded-2">{{ __('Login') }}</a>
                </li>
            @endif
        </ul>
    </div>
</div>
<div>
    <br><br><br><br>
</div>
<!-- End Header -->
