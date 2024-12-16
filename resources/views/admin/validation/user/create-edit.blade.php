<script>
    $('#user-form').validate({
        rules: {
            first_name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            last_name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            middle_name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            email: {
                required: true,
                email: true,
                minlength: 3,
                maxlength: 255
            },
            roles: {
                required: true
            },
            contact_number: {
                required: true,
                minlength: 10,
                maxlength: 15
            },
        },
        messages: {
            first_name: {
                required: "{{ __('validation.required', ['attribute' => __('app.user.first_name')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.user.first_name'), 'min' => 3]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.user.first_name'), 'max' => 255]) }}"
            },
            last_name: {
                required: "{{ __('validation.required', ['attribute' => __('app.user.last_name')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.user.last_name'), 'min' => 3]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.user.last_name'), 'max' => 255]) }}"
            },
            middle_name: {
                required: "{{ __('validation.required', ['attribute' => __('app.user.middle_name')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.user.middle_name'), 'min' => 3]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.user.middle_name'), 'max' => 255]) }}"
            },
            email: {
                required: "{{ __('validation.required', ['attribute' => __('app.user.email')]) }}",
                email: "{{ __('validation.email', ['attribute' => __('app.user.email')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.user.email'), 'min' => 3]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.user.email'), 'max' => 255]) }}"
            },
            roles: {
                required: "{{ __('validation.required', ['attribute' => __('app.user.roles')]) }}"
            },
            contact_number: {
                required: "{{ __('validation.required', ['attribute' => __('app.user.contact_number')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.user.contact_number'), 'min' => 10]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.user.contact_number'), 'max' => 15]) }}"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            // for password with eye icon
            if (element.attr("name") == "password") {
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
