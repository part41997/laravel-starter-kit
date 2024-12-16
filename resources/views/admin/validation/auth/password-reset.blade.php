<script>
    $('#resetPasswordForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                remote: {
                    url: "{{ route('check.password') }}",
                    type: "post",
                    data: {
                        _token: function () {
                            return "{{ csrf_token() }}";
                        }
                    },
                    dataFilter: function (response) {
                        var response = JSON.parse(response);
                        if (response.valid == true || response.valid == 'true') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            email: {
                required: "{{ __('validation.required', ['attribute' => __('app.auth.email')]) }}",
                email: "{{ __('validation.email', ['attribute' => __('app.auth.email')]) }}"
            },
            password: {
                required: "{{ __('validation.required', ['attribute' => __('app.auth.password')]) }}",
                remote: "{{ __('validation.strong_password', ['attribute' => __('app.auth.password')]) }}"
            },
            password_confirmation: {
                required: "{{ __('validation.required', ['attribute' => __('app.auth.confirm_password')]) }}",
                equalTo: "{{ __('validation.same', ['attribute' => __('app.auth.password')]) }}"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            if (element.attr("name") == "password" || element.attr("name") == "password_confirmation") {
                error.insertAfter($(element).parent());
            } else {
                error.insertAfter(element);
            }
            error.addClass('text-danger');
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
</script>