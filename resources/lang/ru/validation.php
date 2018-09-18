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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'Значение :attribute - ссылка неактивна.',
    'after'                => 'Значение :attribute должно быть больше :date.',
    'after_or_equal'       => 'Значение :attribute должно быть больше или равно :date.',
    'alpha'                => 'Значение :attribute должно содержать только буквы letters.',
    'alpha_dash'           => 'Значение :attribute должно содержать только буквы, цифры и дефис.',
    'alpha_num'            => 'Значение :attribute должно содержать только буквы или цифры.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Значение :attribute должно быть между :min и :max.',
        'file'    => 'Размер :attribute должен быть между :min и :max килобайт.',
        'string'  => 'Размер :attribute должен быть между :min и :max символов.',
        'array'   => 'Размер :attribute должен быть между :min и :max значений.',
    ],
    'boolean'              => 'Значение :attribute должно быть содержать значение Да или Нет',
    'confirmed'            => 'Значение :attribute и подтверждение не совпадают.',
    'date'                 => 'Значение :attribute должно быть датой.',
    'date_format'          => 'Значение :attribute не соответствует формату :format.',
    'different'            => 'Значения :attribute и :other должны различаться.',
    'digits'               => 'Значение :attribute должно содержать цифры :digits.',
    'digits_between'       => 'Значение :attribute должно быть между :min и :max.',
    'dimensions'           => 'Значение :attribute не соответсвует нужному размеру изобраения.',
    'distinct'             => 'Значение :attribute содержит повторяющиеся значения.',
    'email'                => 'Значение :attribute должно быть формата email.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'Значение :attribute должно быть файлом.',
    'filled'               => 'Значение :attribute должно быть заполено.',
    'image'                => 'Значение :attribute должно быть изображением.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'Значение :attribute должно быть целым числом.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'Значение :attribute должно быть JSON формата.',
    'max'                  => [
        'numeric' => 'Значение :attribute не может быть больше :max.',
        'file'    => 'Размер файла :attribute не должно быть больше :max килобайт.',
        'string'  => 'Значение :attribute не должно быть длинее :max символов.',
        'array'   => 'Значение :attribute не может содержать больше :max значений.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'Значение :attribute не может быть меньше :min.',
        'file'    => 'Размер файла :attribute не должен быть меньше :min килобайт.',
        'string'  => 'Значение :attribute должно содержать минимум :min символов.',
        'array'   => 'Значение :attribute должно содержать минимум :min значений.',
    ],
    'not_in'               => 'Неверно выбрано значение поля :attribute .',
    'numeric'              => 'Поле :attribute должно быть числом.',
    'present'              => 'Значение поля :attribute должно быть представлено.',
    'regex'                => 'Формат поля :attribute неверный.',
    'required'             => 'Значение [:attribute] обязательно для заполнения.',
    'required_if'          => 'Значение :attribute обязательно, если поле :other равно :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'Поля :attribute и :other должны быть одинаковы.',
    'size'                 => [
        'numeric' => 'Размер :attribute должен быть :size.',
        'file'    => 'Размер :attribute должен быть :size килобайт.',
        'string'  => 'Значение :attribute должно содержать :size символов.',
        'array'   => 'Значение  :attribute должно содержать :size значений.',
    ],
    'string'               => 'Поле :attribute должно быть строкой.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'Поле :attribute должно быть корректной ссылкой.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
