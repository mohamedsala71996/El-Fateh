<div class="sidebar p-2">
    <div class="container-fluid">
        <div class="title-tex my-3">
            <h4 class="sidebar-titl"><span>El-Fateh Admin</span></h4>
        </div>
        <div class="main-menu">
            <ul class="menu-list my-0">
                <li>
                    <a class="m-link {{ Route::is('admins.*') ? 'active' : '' }}" href="{{ route('admins.index') }}">
                        <span class="ms-2">{{ __('Admins') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <span class="ms-2">{{ __('Users') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <span class="ms-2">{{ __('Categories') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('previousWorks.*') ? 'active' : '' }}" href="{{ route('previousWorks.index') }}">
                        <span class="ms-2">Previous works</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('all_articles') ? 'active' : '' }}" href="{{ route('all_articles') }}">
                        <span class="ms-2">Articles</span>
                    </a>
                </li>

                <li>
                    <a class="m-link {{ Route::is('reasons.*') ? 'active' : '' }}" href="{{ route('reasons.index') }}">
                        <span class="ms-2">{{ __('Why us') }}</span>
                    </a>
                </li>
                <!-- Dropdown for Contact and Branches -->
                <li>
                    <a class="m-link {{ Route::is('contact-us.*') || Route::is('branches.*') || Route::is('phone-numbers.*') ? 'active' : '' }} collapsed" data-bs-toggle="collapse" href="#contactBranches" aria-expanded="false" aria-controls="contactBranches">
                        <span class="ms-2">{{ __('Contact us') }}</span>
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="contactBranches">
                        <ul class="sub-menu">
                            <li>
                                <a class="m-link {{ Route::is('contact-us.*') ? 'active' : '' }}" href="{{ route('contact-us.index') }}">
                                    <span class="ms-3">Main branch</span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::is('branches.*') ? 'active' : '' }}" href="{{ route('branches.index') }}">
                                    <span class="ms-3">Branches</span>
                                </a>
                            </li>
                            <li>
                                <a class="m-link {{ Route::is('phone-numbers.*') ? 'active' : '' }}" href="{{ route('phone-numbers.index') }}">
                                    <span class="ms-3">Branches numbers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="m-link {{ Route::is('about-us.*') ? 'active' : '' }}" href="{{ route('about-us.index') }}">
                        <span class="ms-2">{{ __('About us') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('social-media.*') ? 'active' : '' }}" href="{{ route('social-media.index') }}">
                        <span class="ms-2">{{ __('Social media links') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('contactRequest.*') ? 'active' : '' }}" href="{{ route('contactRequest.index') }}">
                        <span class="ms-2">{{ __('Requests of users') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('media-files.*') ? 'active' : '' }}" href="{{ route('media-files.index') }}">
                        <span class="ms-2">{{ __('Media files') }}</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('setting.*') ? 'active' : '' }}" href="{{ route('setting.index') }}">
                        <span class="ms-2">{{ __('Setting') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
