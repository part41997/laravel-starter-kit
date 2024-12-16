@extends('layouts.guest')

@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center p-5 my-auto">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7">
                    <p class="error-text mb-sm-0 mb-2">
                        404
                    </p>
                    <p class="fs-18 fw-semibold mb-3">
                        Oops &#128557;,The page you are looking for is not available.
                    </p>
                    <div class="mb-4">
                        <p class="mb-0">
                            We are sorry for the inconvenience,The page you are trying to access has been removed or
                            never been existed.
                        </p>
                    </div>
                    <a href="{{ URL::to('/') }}" class="btn btn-primary">
                        <i class="ri-arrow-left-line align-middle me-1 d-inline-block"></i>
                        BACK TO HOME
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
