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
            <form action="{{ route('login') }}" method="post" id="loginForm">
                @csrf
                <div class="card custom-card shadow-lg">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">
                            {{ __('app.auth.signin') }}
                        </p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-dark">
                                    {{ __('app.auth.email') }}
                                </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="{{ __('app.auth.email') }}" autocomplete="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                @if (Route::has('password.request'))
                                    <label for="forgot-password" class="form-label text-daerk d-block">
                                        {{ __('app.auth.password') }}
                                        <a href="{{ route('password.request') }}" class="float-end text-danger">
                                            {{ __('app.auth.forgot') }} ?
                                        </a>
                                    </label>
                                @endif
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="{{ __('app.auth.password') }}" autocomplete="current-password">
                                    <span class="input-group-text cursor-pointer"
                                        onclick="togglePassword('password', this)">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('app.auth.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('app.auth.signin') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.validation.auth.login')
@endsection
