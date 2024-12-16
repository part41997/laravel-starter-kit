@extends('layouts.app')
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

<style>
    /* This selector targets the editable element (excluding comments). */
    .ck-editor__editable_inline:not(.ck-comment__input *) {
        height: 300px;
        overflow-y: auto;
    }
</style>
@section('content')
    @include('layouts.partials.page-header', [
        'previous' => route('admin.cms.index'),
    ])
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header d-sm-flex d-block">
                    {{-- Tabs --}}
                    <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                        @foreach ($cms->translates as $translation)
                            <li class="nav-item">
                                <a class="nav-link
                                        @if ($loop->first) active @endif"
                                    id="{{ $translation->id }}-tab" data-bs-toggle="tab" href="#{{ $translation->id }}"
                                    role="tab" aria-controls="{{ $translation->id }}" aria-selected="true">
                                    {{ $translation->language->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Tab Content --}}
                <div class="card-body">
                    <form method="POST" id="cms-form" action="{{ route('admin.cms.update', ['slug' => $cms->slug]) }}">
                        @csrf
                        @method('PUT')
                        <div class="tab-content border-0">
                            @foreach ($cms->translates as $translation)
                                <div class="tab-pane fade
                                        @if ($loop->first) show active @endif"
                                    id="{{ $translation->id }}" role="tabpanel"
                                    aria-labelledby="{{ $translation->id }}-tab">
                                    <div class="row">
                                        <div class="col-12 pb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="{{ $translation->id }}-title">{{ __('app.cms.title') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="translates[{{ $translation->id }}][title]"
                                                    id="{{ $translation->id }}-title" class="form-control"
                                                    value="{{ $translation->title }}">
                                            </div>
                                        </div>

                                        <div class="col-12 pb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="{{ $translation->id }}-content">{{ __('app.cms.content') }}<span
                                                        class="text-danger">*</span></label>
                                                <textarea class="editor" name="translates[{{ $translation->id }}][content]">
                                                    {!! $translation->content !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-sm rounded">
                                {{ __('app.update') }}
                            </button>
                            <a href="{{ route('admin.cms.index') }}"
                                class="btn btn-secondary btn-sm rounded">{{ __('app.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const editors = document.querySelectorAll('.editor');
            editors.forEach(editor => {
                ClassicEditor
                    .create(editor, {
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'bulletedList',
                                'numberedList',
                                '|',
                                'outdent',
                                'indent',
                                '|',
                                'blockQuote',
                                'insertTable',
                                'mediaEmbed',
                                'undo',
                                'redo'
                            ]
                        },
                        language: 'en',
                        table: {
                            contentToolbar: [
                                'tableColumn',
                                'tableRow',
                                'mergeTableCells'
                            ]
                        },
                        licenseKey: '',
                    })
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            editor.updateSourceElement();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });

        });
        $('#cms-form').validate({
            ignore: [],
            rules: {
                @foreach ($cms->translates as $translation)
                    "translates[{{ $translation->id }}][title]": {
                        required: true
                    },
                    "translates[{{ $translation->id }}][content]": {
                        required: true
                    },
                @endforeach
            },
            messages: {
                @foreach ($cms->translates as $translation)
                    "translates[{{ $translation->id }}][title]": {
                        required: "{{ __('validation.required', ['attribute' => __('app.cms.title')]) }}"
                    },
                    "translates[{{ $translation->id }}][content]": {
                        required: "{{ __('validation.required', ['attribute' => __('app.cms.content')]) }}"
                    },
                @endforeach
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                var tabId = $(element).closest('.tab-pane').attr('id');
                var activeTab = `#${tabId}`;
                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('active');
                $('.tab-pane').removeClass('show');
                $(activeTab).addClass('active');
                $(activeTab).addClass('show');
                $(`a[href="${activeTab}"]`).addClass('active');

                if (element.hasClass('editor')) {
                    error.appendTo(element.parent());
                } else {
                    error.insertAfter(element);
                }
                error.addClass('invalid-feedback');
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>
@endsection
