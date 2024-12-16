@extends('layouts.app')

@section('content')
    @include('layouts.partials.page-header', [
        'previous' => route('admin.dashboard.index'),
    ])


<div class="row mb-5">
    <div class="col-md-6 col-12 mx-auto">
        @include('layouts.partials.alerts')
        <div class="card custom-card shadow-lg">
                <div class="card-header d-sm-flex d-block">
                    <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                        <li class="nav-item m-1">
                            <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                                href="#personal-info" aria-selected="true">{{ __('app.user.my_profile') }}</a>
                            </li>
                        <li class="nav-item m-1">
                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                            href="#password-change" aria-selected="true">{{ __('app.user.change_password') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="personal-info" role="tabpanel">
                            <form action="{{ route('admin.users.profile.update') }}" method="POST" id="profile-form">
                                @csrf
                                <input type="hidden" name="user" value="{{ $user->id }}">
                                <input type="hidden" name="role" value="{{ $user->roles->first()->id }}">
                                <div class="p-sm-3 p-0">
                                    <div class="d-flex justify-content-center align-items-center mb-4">
                                        <div class="mb-0 me-5">
                                            <span class="avatar avatar-xxl avatar-rounded">
                                                <img src="{{ $user->profile_picture_url ?? asset('images/faces/9.jpg') }}"
                                                    alt="" id="profile-img"
                                                    oneerror="this.src='{{ asset('images/faces/9.jpg') }}'">
                                                <a href="javascript:void(0);"
                                                    class="badge rounded-pill bg-primary avatar-badge cursor-pointer">
                                                    <input type="file" name="photo"
                                                        class="position-absolute w-100 h-100 op-0" id="profile-change">
                                                    <i class="fe fe-camera"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-md-4 col-12 pb-2">
                                            <label for="first_name" class="form-label">
                                                {{ __('app.user.first_name') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="{{ old('first_name', $user->first_name) }}"
                                                placeholder="{{ __('app.user.first_name') }}" autofocus autocomplete="off"
                                                {{ $user->exists && request()->routeIs('admin.users.show') ? 'disabled' : '' }}>
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-12 pb-2">
                                            <label for="middle_name"
                                                class="form-label">{{ __('app.user.middle_name') }}</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                                value="{{ old('middle_name', $user->middle_name) }}"
                                                placeholder="{{ __('app.user.middle_name') }}" autofocus autocomplete="off"
                                                {{ $user->exists && request()->routeIs('admin.users.show') ? 'disabled' : '' }}>
                                            @error('middle_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-12 pb-2">
                                            <label for="last_name" class="form-label">
                                                {{ __('app.user.last_name') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                value="{{ old('last_name', $user->last_name) }}"
                                                placeholder="{{ __('app.user.last_name') }}" autofocus autocomplete="off"
                                                {{ $user->exists && request()->routeIs('admin.users.show') ? 'disabled' : '' }}>
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-12 pb-2">
                                            <label for="email" class="form-label">
                                                {{ __('app.user.email') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $user->email) }}"
                                                placeholder="{{ __('app.user.email') }}" autocomplete="off"
                                                {{ $user->exists && request()->routeIs('admin.users.show') ? 'disabled' : '' }}>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-12 pb-2">
                                            <label for="contact_number" class="form-label">
                                                {{ __('app.user.contact_number') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="contact_number"
                                                name="contact_number"
                                                value="{{ old('contact_number', $user->contact_number) }}"
                                                placeholder="{{ __('app.user.contact_number') }}" autofocus
                                                autocomplete="off"
                                                {{ $user->exists && request()->routeIs('admin.users.show') ? 'readonly' : '' }}
                                                onkeypress="return checkIsNumber(event)">
                                            @error('contact_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <button class="btn btn-primary btn-sm m-1" type="submit">
                                        {{ __('app.update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="password-change" role="tabpanel">
                            <form action="{{ route('admin.users.change-password') }}" method="POST"
                                id="change-password-form">
                                @csrf
                                <div class="row gy-4 mb-4">
                                    <div class="col-12 pb-2">
                                        <label for="current_password" class="form-label">
                                            {{ __('app.user.current_password') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password"
                                                placeholder="{{ __('app.user.current_password') }}" autocomplete="off"
                                                autofocus>
                                            <span class="input-group-text cursor-pointer"
                                                onclick="togglePassword('current_password', this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        @error('current_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 pb-2">
                                        <label for="password" class="form-label">
                                            {{ __('app.user.new_password') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="{{ __('app.user.new_password') }}" autocomplete="off">
                                            <span class="input-group-text cursor-pointer"
                                                onclick="togglePassword('password', this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 pb-2">
                                        <label for="password_confirmation" class="form-label">
                                            {{ __('app.user.confirm_new_password') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation"
                                                placeholder="{{ __('app.user.confirm_new_password') }}"
                                                autocomplete="off">
                                            <span class="input-group-text cursor-pointer"
                                                onclick="togglePassword('password_confirmation', this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <button class="btn btn-primary btn-sm m-1" type="submit">
                                        {{ __('app.update') }}
                                    </button>
                                </div>
                            </form>
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
            $('#profile-change').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#profile-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

                let formData = new FormData();
                formData.append('photo', this.files[0]);
                formData.append('role', '{{ $user->roles->first()->id }}');
                let otherFields = $('#personal-info').find('input').serializeArray();
                $.each(otherFields, function(key, input) {
                    formData.append(input.name, input.value);
                });

                $.ajax({
                    url: "{{ route('admin.users.profile.update') }}",
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    success: function(response, status, xhr) {
                        if (xhr.status == 200) {
                            $.toast({
                                heading: "{{ __('app.success') }}",
                                text: response.message,
                                showHideTransition: 'slide',
                                icon: 'success',
                                loaderBg: '#f96868',
                                position: 'top-right'
                            });
                        } else {
                            $.toast({
                                heading: "{{ __('app.error') }}",
                                text: response.message,
                                showHideTransition: 'fade',
                                icon: 'error',
                                loaderBg: '#f2a654',
                                position: 'top-right'
                            });
                        }
                    },
                    error: function(response) {
                        $.toast({
                            heading: "{{ __('app.error') }}",
                            text: response.responseJSON.message,
                            showHideTransition: 'fade',
                            icon: 'error',
                            loaderBg: '#f2a654',
                            position: 'top-right'
                        });
                    }
                });
            });
        });

        // Tab active after getting validation error
        $(document).ready(function() {
            let activeTab = "{{ session()->get('active_tab') }}";
            if (activeTab) {
                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('active');
                $('.tab-pane').removeClass('show');
                $(activeTab).addClass('active');
                $(activeTab).addClass('show');
                $(`a[href="${activeTab}"]`).addClass('active');
            }
        });
    </script>

    @include('admin.validation.user.profile')
    @include('admin.validation.user.change-password')
@endsection
