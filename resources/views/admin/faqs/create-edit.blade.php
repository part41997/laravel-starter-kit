@extends('layouts.app')
@section('content')
    @include('layouts.partials.page-header', [
        'previous' => route('admin.faqs.index'),
    ])

    @include('layouts.partials.alerts')

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($faq->exists)
                        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" class="w-100"
                            id="faqs-form">
                            @method('PUT')
                        @else
                            <form action="{{ route('admin.faqs.store') }}" method="POST" class="w-100" id="faqs-form">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-12 pb-2">
                            <label for="question" class="form-label">
                                {{ __('app.faqs.question') }}
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="question" name="question"
                                value="{{ old('question', $faq->question) }}" placeholder="{{ __('app.faqs.question') }}"
                                autofocus autocomplete="off">
                            @error('question')
                                <span id="question-error" class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 pb-2">
                            <label for="answer" class="form-label">
                                {{ __('app.faqs.answer') }}
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="answer" name="answer" value="{{ old('answer', $faq->answer) }}"
                                placeholder="{{ __('app.faqs.answer') }}" autofocus autocomplete="off">{{ old('answer', $faq->answer ?? '') }}</textarea>
                            @error('answer')
                                <span id="answer-error" class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-sm rounded">
                                {{ $faq->exists ? __('app.update') : __('app.create') }}
                            </button>
                            <a href="{{ route('admin.faqs.index') }}" type="button"
                                class="btn btn-secondary btn-sm rounded">{{ __('app.cancel') }}</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.validation.faqs.create-edit')
