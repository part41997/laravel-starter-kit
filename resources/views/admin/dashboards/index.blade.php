@extends('layouts.app')

@section('content')
    @include('layouts.partials.page-header', [
        'daterangepicker' => true,
    ])

    <div class="row">
        {{-- Total Users --}}
        <div class="col-md-4 col-sm-12">
            <div class="card shadow-lg custom-card border-top-card border-top-primary rounded-0">
                <div class="card-body">
                    <div class="text-center">
                        <span class="avatar avatar-md bg-primary shadow-sm avatar-rounded mb-2">
                            <i class="fas fa-users fs-16 text-white"></i>
                        </span>
                        <p class="fs-14 fw-semibold mb-2">{{ __('app.dashboard.total_users') }}</p>
                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                            <h5 class="mb-0 fw-semibold total-users">0</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Active Users --}}
        <div class="col-md-4 col-sm-12">
            <div class="card shadow-lg custom-card border-top-card border-top-success rounded-0">
                <div class="card-body">
                    <div class="text-center">
                        <span class="avatar avatar-md bg-success shadow-sm avatar-rounded mb-2">
                            <i class="fas fa-user-check fs-16 text-white"></i>
                        </span>
                        <p class="fs-14 fw-semibold mb-2">{{ __('app.dashboard.total_active_users') }}</p>
                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                            <h5 class="mb-0 fw-semibold total-active-users">0</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Inactive Users --}}
        <div class="col-md-4 col-sm-12">
            <div class="card shadow-lg custom-card border-top-card border-top-danger rounded-0">
                <div class="card-body">
                    <div class="text-center">
                        <span class="avatar avatar-md bg-danger shadow-sm avatar-rounded mb-2">
                            <i class="fas fa-user-times fs-16 text-white"></i>
                        </span>
                        <p class="fs-14 fw-semibold mb-2">{{ __('app.dashboard.total_inactive_users') }}</p>
                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                            <h5 class="mb-0 fw-semibold total-inactive-users">0</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            dashboardCardStats()
        });

        function dashboardCardStats() {
            let dateRange = $('#filterDateRange').data('daterangepicker');
            dateRange = dateRange ? dateRange.startDate.format('YYYY-MM-DD') + ' - ' + dateRange.endDate.format(
                'YYYY-MM-DD') : '';

            $.ajax({
                url: "{{ route('admin.dashboard.card-stats') }}",
                type: "GET",
                data: {
                    dateRange: dateRange,
                },
                success: function(response) {
                    let totalUsers = response.totalUsers || 0
                    let totalUsersActive = response.totalUsersActive || 0
                    let totalUsersInactive = response.totalUsersInactive || 0

                    animateNumberCount('.total-users', 0, totalUsers, 2000);
                    animateNumberCount('.total-active-users', 0, totalUsersActive, 2000);
                    animateNumberCount('.total-inactive-users', 0, totalUsersInactive, 2000);
                }
            });
        }

        // animate number count
        function animateNumberCount(selector, start, end, duration) {

            if (start == end) {
                $(selector).text(end);
                return;
            }

            let range = end - start;
            let current = start;
            let increment = end > start ? 1 : -1;
            let stepTime = Math.abs(Math.floor(duration / range));
            let timer = setInterval(function() {
                current += increment;
                $(selector).text(current);
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        // #filterDashboard on click filter modal
        $('document').ready(function() {
            $('#filterDashboard').click(function() {
                $('#filterModal').modal('show');
            });
        });

        // #resetFilter on click reset filter
        $('document').ready(function() {
            $('#resetFilter').click(function() {
                $('#filterForm').trigger('reset');
            });
        });

        // filterForm on submit
        $('document').ready(function() {
            $('#filterDateRange').daterangepicker({
                autoUpdateInput: false,
                opens: 'center',
                locale: {
                    format: 'YYYY-MM-DD',
                    cancelLabel: 'Clear'
                },
                maxDate: new Date(),
            });

            $('#filterDateRange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format(
                    'YYYY-MM-DD'));
                dashboardCardStats();
            });

            $('#filterDateRange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                dashboardCardStats();
            });
        });
    </script>
@endsection
