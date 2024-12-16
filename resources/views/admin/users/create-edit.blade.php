@extends('layouts.app')

@section('content')
    @include('layouts.partials.page-header', [
        'previous' => route('admin.users.index'),
    ])
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($user->exists)
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="w-100"
                            id="user-form">
                            @method('PUT')
                        @else
                            <form action="{{ route('admin.users.store') }}" method="POST" class="w-100" id="user-form">
                    @endif
                    @csrf
                    <div class="row">
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
                            <label for="middle_name" class="form-label">{{ __('app.user.middle_name') }}</label>
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
                                value="{{ old('email', $user->email) }}" placeholder="{{ __('app.user.email') }}"
                                autocomplete="off"
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
                            <input type="text" class="form-control" id="contact_number" name="contact_number"
                                value="{{ old('contact_number', $user->contact_number) }}"
                                placeholder="{{ __('app.user.contact_number') }}" autofocus autocomplete="off"
                                {{ $user->exists && request()->routeIs('admin.users.show') ? 'readonly' : '' }}
                                onkeypress="return checkIsNumber(event)">
                            @error('contact_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 col-12 pb-2">
                            <label for="role" class="form-label">
                                {{ __('app.user.role') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control js-example-basic-single" id="role" name="role"
                                {{ request()->routeIs('admin.users.show') ? 'disabled' : '' }}>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('role', $user->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-3" {{ request()->routeIs('admin.users.show') ? 'style=display:none' : '' }}>
                            <button type="submit" class="btn btn-primary btn-sm rounded">
                                {{ $user->exists ? __('app.update') : __('app.create') }}
                            </button>
                            <a href="{{ route('admin.users.index') }}" type="button"
                                class="btn btn-secondary btn-sm rounded">{{ __('app.cancel') }}</a>
                        </div>
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
            $('#role').select2({
                placeholder: "{{ __('app.user.select_role') }}",
                multiple: false,
                width: '100%',
            });
        });
    </script>
    @include('admin.validation.user.create-edit')
@endsection
