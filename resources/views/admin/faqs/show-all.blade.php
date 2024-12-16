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
                    @forelse ($faqs ?? [] as $faq)
                        <div class="accordion accordion-primary" id="accordionPrimaryExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $faq->id }}"> <button
                                        class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}"
                                        aria-expanded="true" aria-controls="collapse-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $faq->id }}"
                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordionPrimaryExample">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning" role="alert">
                            {{ __('app.faqs.no_options_found') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
