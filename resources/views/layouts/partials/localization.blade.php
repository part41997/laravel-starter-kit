@use('\App\Models\Language')
@php
    $locales = Language::select('id', 'name', 'locale', 'flag')->get()->toArray();

    $currentLocale = app()->getLocale();
    // sort the locales by the current locale
    usort($locales, function ($a, $b) use ($currentLocale) {
        if ($a['locale'] === $currentLocale) {
            return -1;
        }
        if ($b['locale'] === $currentLocale) {
            return 1;
        }
        return 0;
    });
@endphp

<div class="header-element country-selector">
    <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
        data-bs-toggle="dropdown">
        <img src="{{ $locales[0]['flag_url'] }}" alt="img"
            class="rounded-circle header-link-icon">
    </a>
    <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
        @foreach ($locales as $locale => $data)
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.swap', $data['locale']) }}">
                    <span class="avatar avatar-xs lh-1 me-2">
                        <img src="{{ $data['flag_url'] }}" alt="img">
                    </span>
                    {{ $data['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
