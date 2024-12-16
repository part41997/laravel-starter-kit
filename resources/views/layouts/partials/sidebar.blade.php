<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        <a href="{{ URL::to('/') }}" class="header-logo">
            <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="desktop-white">
            <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="toggle-white">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                {{-- Dashboard --}}
                <li class="slide text-align-center">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="side-menu__item {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('app.menu.dashboard') }}</span>
                    </a>
                    </a>
                </li>

                {{-- Users --}}
                <li class="slide text-align-center">
                    <a href="{{ route('admin.users.index') }}"
                        class="side-menu__item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fa fa-user side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('app.menu.users') }}</span>
                    </a>
                    </a>
                </li>

                {{-- CMS --}}
                <li class="slide">
                    <a href="{{ route('admin.cms.index') }}"
                        class="side-menu__item {{ request()->routeIs('admin.cms.*') ? 'active' : '' }}">
                        <i class="fa fa-regular fa-file side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('app.menu.cms') }}</span>
                    </a>
                </li>

                {{-- FAQ --}}
                <li class="slide">
                    <a href="{{ route('admin.faqs.index') }}"
                        class="side-menu__item {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                        <i class="fa fa-solid fa-question side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('app.menu.faqs') }}</span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
    </div>
</aside>
