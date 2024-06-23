<!-- start Header -->
@php
    $aboutUs = \App\Models\AboutUs::first();
@endphp
<style>
    .company-name {
        color: darkgoldenrod;
        font-size: 24px;
        /* Adjust font size as needed */
        font-weight: bold;
        /* Optional: Add bold font weight */
    }

    .founded-date {
        color: darkgoldenrod;
        font-size: 14px;
        /* Adjust font size as needed */
        font-style: italic;
        /* Optional: Apply italic style */
        margin-left: 5px;
        /* Optional: Add some space between company name and founded date */
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }
</style>
<div data-wow-duration="2s" data-wow-delay="0.5s" class="navbar navbar-expand-lg  position-fixed w-100 top-0"
    style="z-index: 100; box-shadow: 0px 4px 8px 0px darkgoldenrod;" id="box1">
    <a class="navbar-brand" href="{{ route('website') }}">
        <span class="company-name">{{ $aboutUs->{app()->getLocale() . '_company_name'} ?? __('El-Fateh') }}</span>
        @isset($aboutUs->founded_date)
            <span class="founded-date">{{ __('since') }}
                {{ \Carbon\Carbon::parse($aboutUs->founded_date)->format('Y') }}</span>
        @endisset
    </a>
    <div class="nav-link btn" style="margin-right: auto;">
        {{-- <a href="{{ route('localeChange', 'ar') }}"
            style="color: darkgoldenrod; text-decoration: none; margin-right: 10px;">{{ __('Arabic') }}</a>
        <a href="{{ route('localeChange', 'en') }}"
            style="color: darkgoldenrod; text-decoration: none;">{{ __('English') }}</a> --}}
            <a href="{{ route('localeChange', 'en') }}" style="margin-right: 20px">
                <img src="{{ asset('assets/images/english.png') }}"
                  style="width: 23px; background-color:darkgoldenrod;border-radius: 5px;" title="English">
              </a>
              <a href="{{ route('localeChange', 'ar') }}"  >
                <img class="al" src="{{ asset('assets/images/arabic.png') }}"
                  style="width: 25px; background-color:darkgoldenrod;border-radius: 5px;" title="عربي">
              </a>
    </div>
    <!--<button class="nav-link btn" id="dark-mode-toggle">-->
    <!--    <img class="al" src="{{ url('/') }}/assets/images/light-mode.png" style="width: 20px; background-color:darkgoldenrod;border-radius: 5px;" alt="{{ __('Light Mode') }}">-->
    <!--</button>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"
        style="background-color: aliceblue;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-right: 40px;" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" style="padding-right: 20px;">
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('articles.index') }}"
                    style="margin: 10; color: darkgoldenrod;">{{ __('Articles') }}</a>
            </li>
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('requestUser.index') }}"
                    style="margin: 10; color: darkgoldenrod;">{{ __('Requests') }}</a>
            </li>
            <li class="nav-item">

                <div class="dropdown" style="margin: 27px;">
                  <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" style="color: darkgoldenrod; text-decoration: none;">
                    {{ __('What We Do') }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @php
                        $categories = \App\Models\Category::get();
                    @endphp
                    @foreach ($categories as $category)
                    <a class="dropdown-item" href="{{ route('allPreviousWorks', $category->id) }}" style=" color: darkgoldenrod;">{{ $category->{app()->getLocale() . '_name'} }}</a>
                    @endforeach
                  </div>
                </div>
              </li>
            <li class="nav-item">

                <div class="dropdown" style="margin: 27px;">
                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="color: darkgoldenrod; text-decoration: none;">
                        {{ __('Our Company') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('about.index') }}"
                            style=" color: darkgoldenrod;">{{ __('About') }}</a>
                        <a class="dropdown-item" href="{{ route('whyUs.index') }}"
                            style="color: darkgoldenrod;">{{ __('Why Us') }}</a>
                    </div>
                </div>
            </li>

            {{-- <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('whyUs.index') }}" style="color: darkgoldenrod;">{{ __('Why Us')
                    }}</a>
            </li> --}}
            <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('web_branches.index') }}"
                    style="color: darkgoldenrod;">{{ __('Contact us') }}</a>
            </li>
            {{-- <li class="nav-item" style="margin: 20px;">
                <a class="nav-link" href="{{ route('about.index') }}" style="color: darkgoldenrod;">{{ __('About')
                    }}</a>
            </li> --}}
            <li class="nav-item" style="margin: 20px;">
                @if (isset($aboutUs->logo))
                    <img src="{{ asset('storage/' . $aboutUs->logo) }}" id="navbar-brand"
                        style="position: relative; width:40px" alt="">
                @else
                    <img src="{{ url('/') }}/assets/images/logo.jpeg" id="navbar-brand"
                        style="position: relative; width:40px" alt="">
                @endif
            </li>
            @if (auth()->guard('web')->check())
                <li class="nav-item" style="margin: 20px;">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn bg-secondary text-light text-uppercase rounded-2">{{ __('Sign out') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item" style="margin: 20px;">
                    <a href="{{ route('login.user') }}"
                        class="btn bg-secondary text-light text-uppercase rounded-2">{{ __('Login') }}</a>
                </li>
            @endif
        </ul>
    </div>
</div>

<div>
    <br><br><br><br>
</div>
<!-- End Header -->
