@extends('layouts.app')
@section('content')
    @include('layouts.partials.page-header', [
        'actions' => [
            [
                'label' => __('app.actions.create'),
                'url' => route('admin.users.create'),
                'icon' => 'plus',
                'class' => 'primary',
            ],
            [
                'label' => __('app.actions.filter'),
                'url' => 'javascript:void(0)',
                'icon' => 'filter',
                'class' => 'info',
                'data' => [
                    'toggle' => 'collapse',
                    'target' => '#filterCollapse',
                ],
            ],
        ],
    ])

    @include('layouts.partials.alerts')

    {{-- Collapse Filter Panel --}}
    <div class="collapse" id="filterCollapse">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="filterDateRange" class="form-label">{{ __('app.date_range') }}</label>
                            <input type="text" name="date_range" id="filterDateRange" class="form-control"
                                value="{{ request('date_range') }}" autocomplete="off" readonly
                                placeholder="{{ __('app.date_range') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="filterRole" class="form-label">{{ __('app.user.role') }}</label>
                            <select name="role" id="filterRole" class="form-select">
                                <option value="">{{ __('app.all') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="filterStatus" class="form-label">{{ __('app.status') }}</label>
                            <select name="status" id="filterStatus" class="form-select">
                                <option value="">{{ __('app.all') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary btn-sm rounded" id="filterButton">
                                {{ __('app.actions.filter') }}
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm rounded" id="clearButton">
                                {{ __('app.actions.clear') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'w-100']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#users-table').on('preXhr.dt', function(e, settings, data) {
                var dateRangePicker = $('#filterDateRange').data('daterangepicker');
                var startDate = $('#filterDateRange').val();
                if (startDate == '') {
                    startDate = null;
                    endDate = null;
                } else {
                    startDate = dateRangePicker.startDate.format('YYYY-MM-DD');
                    endDate = dateRangePicker.endDate.format('YYYY-MM-DD');
                }
                data.role = $('#filterRole').val();
                data.status = $('#filterStatus').val();
                data.start_date = startDate;
                data.end_date = endDate;
            });

            window.showTable = function() {
                window.LaravelDataTables["users-table"].draw();
            }

            $('#filterDateRange').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD',
                },
                autoUpdateInput: false,
                maxDate: new Date(),
            });

            $('#filterDateRange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format(
                    'YYYY-MM-DD'));
            });

            // select2 ajax for roles & status
            $('#filterRole').select2({
                dropdownParent: $('#filterCollapse'),
                placeholder: "{{ __('app.select_role') }}",
                ajax: {
                    url: "{{ route('admin.roles.select2') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true,
                },
            });

            $('#filterStatus').select2({
                dropdownParent: $('#filterCollapse'),
                placeholder: "{{ __('app.select_status') }}",
                ajax: {
                    url: "{{ route('admin.users.status.select2') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true,
                },
            });

            // On Click Filter Button
            $('#filterButton').on('click', function() {
                window.LaravelDataTables["users-table"].draw();
            });

            // On Click Clear Button
            $('#clearButton').on('click', function() {
                $('#filterRole').val(null).trigger('change');
                $('#filterStatus').val(null).trigger('change');
                $('#filterDateRange').val('');
                window.LaravelDataTables["users-table"].draw();
            });
        });

        function deleteUser(id) {
            Swal.fire({
                title: "{{ __('messages.are_you_sure') }}",
                text: "{!! __('messages.you_wont_be_able_to_revert_this') !!}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('messages.yes_delete_it') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('admin.users.destroy', ':id') }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(response, status, xhr) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: response.title,
                                    text: response.message,
                                    icon: 'success'
                                });
                                showTable()
                                return;
                            }
                            showTable()
                        },
                        error: function(response) {
                            Swal.fire({
                                title: response.responseJSON.title,
                                text: response.responseJSON.message,
                                icon: 'error'
                            });
                        }
                    });

                }
            });
        }
    </script>
@endsection
