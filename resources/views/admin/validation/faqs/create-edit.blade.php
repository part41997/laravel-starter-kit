<script type="module">
    console.log('here');
    var formValidaor = $('#faqs-form').validate({
        rules: {
            question: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            answer: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
        },
        messages: {
            question: {
                required: "{{ __('validation.required', ['attribute' => __('app.faqs.question')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.faqs.question'), 'min' => 3]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.faqs.question'), 'max' => 255]) }}"
            },
            answer: {
                required: "{{ __('validation.required', ['attribute' => __('app.faqs.answer')]) }}",
                minlength: "{{ __('validation.min.string', ['attribute' => __('app.faqs.answer'), 'min' => 3]) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => __('app.faqs.answer'), 'max' => 255]) }}"
            },
        },
        submitHandler: function(form) {
            $(form).find('button[type="submit"]').prop('disabled', true);
            form.submit();
        }
    });
</script>
