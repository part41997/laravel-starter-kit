<script>
    $('#change-password-form').validate({
        rules: {
            current_password: {
                required: true,
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
            current_password: {
                required: 'Please enter your current password',
                minlength: 'Password must be at least 6 characters'
            },
            password: {
                required: 'Please enter your new password',
                remote: "{{ __('validation.strong_password', ['attribute' => __('app.auth.password')]) }}"
            },
            password_confirmation: {
                required: 'Please enter your new password again',
                equalTo: "{{ __('validation.same', ['attribute' => __('app.auth.password')]) }}"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "password") {
                error.insertAfter($(element).parent());
            } else {
                error.insertAfter(element);
            }

            error.addClass('text-danger');
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