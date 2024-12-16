@extends('layouts.app')
@section('content')
    @include('layouts.partials.page-header', [
        'actions' => [
            [
                'label' => __('app.actions.create'),
                'url' => route('admin.faqs.create'),
                'icon' => 'plus',
                'class' => 'primary',
            ],
            [
                'label' => __('app.actions.show'),
                'url' => route('admin.faqs.show-all'),
                'icon' => 'eye',
                'class' => 'info',
            ],
        ],
    ])

    @include('layouts.partials.alerts')

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
            window.showTable = function() {
                window.LaravelDataTables["faq-table"].draw();
            }
        });

        function deleteFaq(id) {
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
                    let url = "{{ route('admin.faqs.destroy', ':id') }}";
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
