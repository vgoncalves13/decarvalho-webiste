<?php

declare(strict_types=1);

return [
    'base_url' => 'https://decarvalhoservice.ch',
    'company_name' => 'De Carvalho Service GmbH',
    'destination_email' => 'info@decarvalhoservice.ch',
    'public_email' => 'info@decarvalhoservice.ch',
    'phones' => [
        [
            'label' => 'Telefon 1',
            'display' => '+41 79 101 31 57',
            'href' => '+41791013157',
        ],
        [
            'label' => 'Telefon 2',
            'display' => '+41 79 136 14 93',
            'href' => '+41791361493',
        ],
    ],
    'whatsapp_number' => '41791013157',
    'default_from' => [
        'email' => 'no-reply@example.ch',
        'name' => 'De Carvalho Service Website',
    ],
    'smtp' => [
        'host' => 'smtp.example.ch',
        'port' => 587,
        'username' => 'smtp-user',
        'password' => 'smtp-password',
        'encryption' => 'tls',
    ],
];
