<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div class="d-flex align-items-center">
        @isset($previous)
            <a href="{{ $previous }}"
                class="btn btn-primary btn-sm rounded me-2 text-center d-flex align-items-center p-2">
                <i class="fa fa-arrow-left fs-16"></i>
            </a>
        @endisset
        <h1 class="page-title fw-semibold fs-16 mb-0">{{ $pageTitle ?? config('app.name') }}</h1>
    </div>
    <div class="ms-md-1 ms-0">
        @isset($daterangepicker)
            <input type="text" class="form-control fs-14 border-1" autocomplete="off" readonly id="filterDateRange"
                name="filterDateRange" placeholder="{{ __('app.date_range') }}">
        @endisset

        @isset($actions)
            <div class="d-flex align-items-center">
                @foreach ($actions as $action)
                    @isset($action['data'])
                        <a href="{{ $action['url'] }}"
                            class="btn btn-{{ $action['class'] ?? 'secondary' }} btn-sm rounded me-2 text-center d-flex align-items-center p-2"
                            data-bs-toggle="{{ $action['data']['toggle'] }}" data-bs-target="{{ $action['data']['target'] }}">
                            <i class="fa fa-{{ $action['icon'] }} fs-14"></i>
                            <span class="ms-2">{{ $action['label'] }}</span>
                        </a>
                        <div class="collapse" id="{{ $action['data']['target'] }}">
                            <!-- Collapsible content goes here -->
                        </div>
                    @else
                        <a href="{{ $action['url'] }}"
                            class="btn btn-{{ $action['class'] ?? 'secondary' }} btn-sm rounded me-2 text-center d-flex align-items-center p-2 btn-{{ strtolower($action['label']) }}">
                            <i class="fa fa-{{ $action['icon'] }} fs-14"></i>
                            <span class="ms-2">{{ $action['label'] }}</span>
                        </a>
                    @endisset
                @endforeach
            </div>
        @endisset

        @isset($languages)
            <select class="form-select form-select-sm rounded fs-14 d-none" id="language" name="language">
                @foreach ($languages as $language)
                    <option value="{{ $language->locale }}"
                        {{ request()->segment(3) === $language->locale ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        @endisset
    </div>
</div>
