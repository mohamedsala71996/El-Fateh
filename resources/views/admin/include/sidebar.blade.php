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
                <li>
                    <a class="m-link {{ Route::is('contact-us.*') ? 'active' : '' }}" href="{{ route('contact-us.index') }}">
                        <span class="ms-2">Contact us</span>
                    </a>
                </li>
                <li>
                    <a class="m-link {{ Route::is('about-us.*') ? 'active' : '' }}" href="{{ route('about-us.index') }}">
                        <span class="ms-2">{{ __('About us') }}</span>
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
