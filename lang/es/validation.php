<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute field must be accepted.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => 'The :attribute field must be a valid URL.',
    'after' => 'The :attribute field must be a date after :date.',
    'after_or_equal' => 'The :attribute field must be a date after or equal to :date.',
    'alpha' => 'The :attribute field must only contain letters.',
    'alpha_dash' => 'The :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute field must only contain letters and numbers.',
    'array' => 'The :attribute field must be an array.',
    'ascii' => 'The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attribute field must be a date before :date.',
    'before_or_equal' => 'The :attribute field must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute field must have between :min and :max items.',
        'file' => 'The :attribute field must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute field must be between :min and :max.',
        'string' => 'The :attribute field must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'can' => 'El campo :attribute contiene un valor no autorizado.',
        'confirmed' => 'La confirmación del campo :attribute no coincide.',
        'current_password' => 'La contraseña es incorrecta.',
        'date' => 'El campo :attribute debe ser una fecha válida.',
        'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
        'date_format' => 'El campo :attribute debe coincidir con el formato :format.',
        'decimal' => 'El campo :attribute debe tener :decimal lugares decimales.',
        'declined' => 'El campo :attribute debe ser rechazado.',
        'declined_if' => 'El campo :attribute debe ser rechazado cuando :other es :value.',
        'different' => 'El campo :attribute y :other deben ser diferentes.',
        'digits' => 'El campo :attribute debe tener :digits dígitos.',
        'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
        'dimensions' => 'El campo :attribute tiene dimensiones de imagen inválidas.',
        'distinct' => 'El campo :attribute tiene un valor duplicado.',
        'doesnt_end_with' => 'El campo :attribute no debe terminar con ninguno de los siguientes: :values.',
        'doesnt_start_with' => 'El campo :attribute no debe comenzar con ninguno de los siguientes: :values.',
        'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
        'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes: :values.',
        'enum' => 'El :attribute seleccionado es inválido.',
        'exists' => 'El :attribute seleccionado es inválido.',
        'extensions' => 'El campo :attribute debe tener una de las siguientes extensiones: :values.',
        'file' => 'El campo :attribute debe ser un archivo.',
        'filled' => 'El campo :attribute debe tener un valor.',
        'gt' => [
            'array' => 'El campo :attribute debe tener más de :value elementos.',
            'file' => 'El campo :attribute debe ser mayor que :value kilobytes.',
            'numeric' => 'El campo :attribute debe ser mayor que :value.',
            'string' => 'El campo :attribute debe ser mayor que :value caracteres.',
        ],
        'gte' => [
            'array' => 'El campo :attribute debe tener :value elementos o más.',
            'file' => 'El campo :attribute debe ser mayor o igual que :value kilobytes.',
            'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
            'string' => 'El campo :attribute debe ser mayor o igual que :value caracteres.',
        ],
        'hex_color' => 'El campo :attribute debe ser un color hexadecimal válido.',
        'image' => 'El campo :attribute debe ser una imagen.',
        'in' => 'El :attribute seleccionado es inválido.',
        'in_array' => 'El campo :attribute debe existir en :other.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'ip' => 'El campo :attribute debe ser una dirección IP válida.',
        'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
        'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
        'json' => 'El campo :attribute debe ser una cadena JSON válida.',
        'lowercase' => 'El campo :attribute debe estar en minúsculas.',
        'lt' => [
            'array' => 'El campo :attribute debe tener menos de :value elementos.',
            'file' => 'El campo :attribute debe ser menor que :value kilobytes.',
            'numeric' => 'El campo :attribute debe ser menor que :value.',
            'string' => 'El campo :attribute debe ser menor que :value caracteres.',
        ],
        'lte' => [
            'array' => 'El campo :attribute no debe tener más de :value elementos.',
            'file' => 'El campo :attribute debe ser menor o igual que :value kilobytes.',
            'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
            'string' => 'El campo :attribute debe ser menor o igual que :value caracteres.',
        ],
        'mac_address' => 'El campo :attribute debe ser una dirección MAC válida.',
        'max' => [
            'array' => 'El campo :attribute no debe tener más de :max elementos.',
            'file' => 'El campo :attribute no debe ser mayor que :max kilobytes.',
            'numeric' => 'El campo :attribute no debe ser mayor que :max.',
            'string' => 'El campo :attribute no debe ser mayor que :max caracteres.',
        ],
        'max_digits' => 'El campo :attribute no debe tener más de :max dígitos.',
        'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
        'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
        'min' => [
            'array' => 'El campo :attribute debe tener al menos :min elementos.',
            'file' => 'El campo :attribute debe ser al menos :min kilobytes.',
            'numeric' => 'El campo :attribute debe ser al menos :min.',
            'string' => 'El campo :attribute debe ser al menos :min caracteres.',
        ],
        'min_digits' => 'El campo :attribute debe tener al menos :min dígitos.',
        'missing' => 'El campo :attribute debe faltar.',
        'missing_if' => 'El campo :attribute debe faltar cuando :other es :value.',
        'missing_unless' => 'El campo :attribute debe faltar a menos que :other sea :value.',
        'missing_with' => 'El campo :attribute debe faltar cuando :values está presente.',
        'missing_with_all' => 'El campo :attribute debe faltar cuando :values están presentes.',
        'multiple_of' => 'El campo :attribute debe ser un múltiplo de :value.',
        'not_in' => 'El :attribute seleccionado es inválido.',
        'not_regex' => 'El formato del campo :attribute es inválido.',
        'numeric' => 'El campo :attribute debe ser un número.',
        'password' => [
            'letters' => 'El campo :attribute debe contener al menos una letra.',
            'mixed' => 'El campo :attribute debe contener al menos una letra mayúscula y una minúscula.',
            'numbers' => 'El campo :attribute debe contener al menos un número.',
            'symbols' => 'El campo :attribute debe contener al menos un símbolo.',
            'uncompromised' => 'El :attribute proporcionado ha aparecido en una filtración de datos. Por favor, elija un :attribute diferente.',
        ],
        'present' => 'El campo :attribute debe estar presente.',
        'present_if' => 'El campo :attribute debe estar presente cuando :other es :value.',
        'present_unless' => 'El campo :attribute debe estar presente a menos que :other sea :value.',
        'present_with' => 'El campo :attribute debe estar presente cuando :values está presente.',
        'present_with_all' => 'El campo :attribute debe estar presente cuando :values están presentes.',
        'prohibited' => 'El campo :attribute está prohibido.',
        'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
        'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
        'prohibits' => 'El campo :attribute prohíbe que :other esté presente.',
        'regex' => 'El formato del campo :attribute es inválido.',
        'required' => 'El campo :attribute es obligatorio.',
        'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
        'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
        'required_if_accepted' => 'El campo :attribute es obligatorio cuando :other es aceptado.',
        'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
        'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
        'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
        'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
        'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los :values está presente.',
        'same' => 'El campo :attribute debe coincidir con :other.',
        'size' => [
            'array' => 'El campo :attribute debe contener :size elementos.',
            'file' => 'El campo :attribute debe ser :size kilobytes.',
            'numeric' => 'El campo :attribute debe ser :size.',
            'string' => 'El campo :attribute debe tener :size caracteres.',
        ],
        'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes: :values.',
        'string' => 'El campo :attribute debe ser una cadena de texto.',
        'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
        'unique' => 'El :attribute ya ha sido tomado.',
        'uploaded' => 'El :attribute no se pudo cargar.',
        'uppercase' => 'El campo :attribute debe estar en mayúsculas.',
        'url' => 'El campo :attribute debe ser una URL válida.',
        'ulid' => 'El campo :attribute debe ser un ULID válido.',
        'uuid' => 'El campo :attribute debe ser un UUID válido.',
        'incorrect_old_password' => 'La contraseña actual es incorrecta.',

        /*
        |--------------------------------------------------------------------------
        | Custom Validation Language Lines
        |--------------------------------------------------------------------------
        |
        | Aquí puedes especificar mensajes de validación personalizados para atributos utilizando la
        | convención "attribute.rule" para nombrar las líneas. Esto nos permite
        | especificar rápidamente un mensaje personalizado específico para una regla de atributo dada.
        |
        */

        'custom' => [
            'attribute-name' => [
                'rule-name' => 'mensaje-personalizado',
            ],
        ],

        'strong_password' => 'El :attribute debe contener al menos una letra mayúscula, una letra minúscula, un número y un símbolo.',

        /*
        |--------------------------------------------------------------------------
        | Custom Validation Attributes
        |--------------------------------------------------------------------------
        |
        | Las siguientes líneas de idioma se utilizan para intercambiar nuestro marcador de posición de atributo
        | con algo más fácil de leer para el lector, como "Dirección de correo electrónico" en lugar de "email".
        | Esto simplemente nos ayuda a hacer nuestro mensaje más expresivo.
        |
        */

        'attributes' => [],

    ];
