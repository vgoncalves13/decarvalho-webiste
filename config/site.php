<?php

declare(strict_types=1);

$envFile = dirname(__DIR__) . '/.env';
$env = is_file($envFile) ? (parse_ini_file($envFile, false, INI_SCANNER_TYPED) ?: []) : [];
$get = static fn (string $key, mixed $default): mixed => $env[$key] ?? $default;

return [
    'base_url' => (string) $get('BASE_URL', 'https://decarvalhoservice.ch'),
    'company_name' => (string) $get('COMPANY_NAME', 'De Carvalho Service GmbH'),
    'destination_email' => (string) $get('DESTINATION_EMAIL', 'info@decarvalhoservice.ch'),
    'public_email' => (string) $get('PUBLIC_EMAIL', 'info@decarvalhoservice.ch'),
    'phones' => [
        [
            'label' => (string) $get('PHONE_1_LABEL', 'Telefon 1'),
            'display' => (string) $get('PHONE_1_DISPLAY', '+41 79 101 31 57'),
            'href' => (string) $get('PHONE_1_HREF', '+41791013157'),
        ],
        [
            'label' => (string) $get('PHONE_2_LABEL', 'Telefon 2'),
            'display' => (string) $get('PHONE_2_DISPLAY', '+41 79 136 14 93'),
            'href' => (string) $get('PHONE_2_HREF', '+41791361493'),
        ],
    ],
    'whatsapp_number' => (string) $get('WHATSAPP_NUMBER', '41791013157'),
    'default_from' => [
        'email' => (string) $get('DEFAULT_FROM_EMAIL', 'no-reply@example.ch'),
        'name' => (string) $get('DEFAULT_FROM_NAME', 'De Carvalho Service Website'),
    ],
];
