@extends('layouts.guest')

@section('content')
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 d-flex justify-content-center">
                <a href="{{ URL::to('/') }}">
                    <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="desktop-logo">
                    <img src="{{ asset('images/brand-logos/logo.png') }}" alt="logo" class="desktop-dark">
                </a>
            </div>
            @include('admin.sections.alerts')
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="card custom-card shadow-lg">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">
                            {{ __('app.auth.reset_password') }}
                        </p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-dark">
                                    {{ __('app.auth.email') }}
                                </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('app.auth.email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-3">
                                <a href="{{ route('login') }}" class="btn btn-dark w-100">
                                    {{ __('app.auth.back') }}
                                </a>
                            </div>
                            <div class="col-md-6 mt-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('app.auth.send_password_reset_link') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection