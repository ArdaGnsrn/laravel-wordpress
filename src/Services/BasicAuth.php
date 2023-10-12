<?php

namespace ArdaGnsrn\WordPress\Services;

use ArdaGnsrn\WordPress\Contracts\WordPressAuth;
use ArdaGnsrn\WordPress\Traits\AuthHostTrait;

class BasicAuth implements WordPressAuth
{
    use AuthHostTrait;

    public function getClientOptions(): array
    {
        return [
            'base_uri' => $this->getHost(),
            'auth' => [
                config('wordpress.auth.basic.username'),
                config('wordpress.auth.basic.password'),
            ],
        ];
    }
}
