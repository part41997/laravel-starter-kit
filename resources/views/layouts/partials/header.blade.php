<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a class="header-logo" href="{{ URL::to('/') }}">
                        <img src="{{ asset('images/brand-logos/melly_logo_text_red.svg') }}" alt="logo" class="desktop-logo">
                        <img src="{{ asset('images/brand-logos/melly_logo_text_red.svg') }}" alt="logo" class="toggle-logo">
                        <img src="{{ asset('images/brand-logos/melly_logo_text_red.svg') }}" alt="logo" class="desktop-dark">
                        <img src="{{ asset('images/brand-logos/melly_logo_text_red.svg') }}" alt="logo" class="toggle-dark">
                        <img src="{{ asset('images/brand-logos/melly_logo_text_red.svg') }}" alt="logo" class="desktop-white">
                        <img src="{{ asset('images/brand-logos/melly_logo_text_red.svg') }}" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <div class="header-element">
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            </div>
        </div>
        <div class="header-content-right">
            {{-- Localization --}}
            {{-- @include('layouts.partials.localization') --}}

            {{-- Dark Mode --}}
            <div class="header-element header-theme-mode">
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <i class="fa fa-moon header-link-icon"></i>
                    </span>
                    <span class="dark-layout">
                        <i class="fa fa-sun header-link-icon"></i>
                    </span>
                </a>
            </div>

            {{-- Full Screen --}}
            <div class="header-element header-fullscreen">
                <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                    <i class="fa fa-expand full-screen-open header-link-icon"></i>
                    <i class="fa fa-compress full-screen-close header-link-icon d-none"></i>
                </a>
            </div>

            {{-- User Settings --}}
            <div class="header-element">
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="{{ Auth::user()->profile_picture_url ?? asset('images/faces/9.jpg') }}" alt="img" width="32" height="32"
                                class="rounded-circle" onerror="this.src='{{ asset('images/faces/9.jpg') }}'">
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1">{{ Auth::user()->full_name }}</p>
                            <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->roles->first()->name }}</span>
                        </div>
                    </div>
                </a>
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item d-flex" href="{{ route('admin.users.profile') }}"><i
                                class="fa fa-user-circle fs-18 me-2 op-7"></i>{{ __('app.header.profile') }}</a></li>
                    <li><a class="dropdown-item d-flex" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="ti ti-logout fs-18 me-2 op-7"></i>{{ __('app.header.logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>

            <!-- Switcher -->
            <div class="header-element">
                <a href="javascript:void(0);" class="header-link switcher-icon" data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                    <i class="fa fa-cog header-link-icon"></i>
                </a>
            </div>
        </div>
    </div>
</header>
