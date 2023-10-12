<?php

return [
    /*
     | --------------------------------------------------------------
     | WordPress Authentication Type
     | --------------------------------------------------------------
     |
     | This value determines the "authentication type" that will be used
     | when your application is communicating with WordPress.
     |
     | Supported: "basic"
     |
     */
    'auth_type' => env('WP_AUTH_TYPE', 'basic'),

    /*
     | --------------------------------------------------------------
     | WordPress Host
     | --------------------------------------------------------------
     |
     | This value determines the "host" that will be used
     | when your application is communicating with WordPress.
     |
     */
    'host' => env('WP_HOST', 'http://localhost'),

    /*
     | --------------------------------------------------------------
     | WordPress Authentication Credentials
     | --------------------------------------------------------------
     |
     | These values determines the "authentication credentials" that will be used
     | when your application is communicating with WordPress.
     |
     */
    'auth' => [
        'basic' => [
            'username' => env('WP_USERNAME', 'admin'),
            'password' => env('WP_PASSWORD', 'password'),
        ],
    ],
];
