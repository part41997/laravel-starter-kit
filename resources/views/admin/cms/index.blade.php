@extends('layouts.app')
@section('content')
    @include('layouts.partials.page-header')

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
@endsection
