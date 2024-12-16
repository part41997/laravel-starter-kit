@extends('layouts.guest')
@section('content')
    @include('layouts.partials.page-header', [
        'languages' => $languages,
    ])

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    {!! $cms->content !!}
                </div>
                <span class="text-center text-muted"> Copyright &copy;
                    {{ date('Y') }}
                    {{ config('app.name') }}. All rights reserved.
                </span>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            if ($('#language').length) {
                $('#language').on('change', function() {
                    let locale = $(this).val();
                    let currentUrl = window.location.href;
                    let url = currentUrl.substring(0, currentUrl.lastIndexOf('/') + 1) + locale;
                    window.location.href = url;
                });
            }
        });
    </script>
@endsection
