<?php

namespace ArdaGnsrn\WordPress\Services;

use ArdaGnsrn\WordPress\Contracts\WordPressAuth;
use ArdaGnsrn\WordPress\Traits\WPAuthTrait;

class BasicAuth implements WordPressAuth
{
    use WPAuthTrait;

    protected string $username;
    protected string $password;

    public function init(string $host = null, string $username = null, string $password = null): void
    {
        if ($host) $this->setHost($host);

        $this->setUsername($username ?? config('wordpress.auth.basic.username'));
        $this->setPassword($password ?? config('wordpress.auth.basic.password'));
    }

    public function getClientOptions(): array
    {
        return [
            'auth' => [$this->username, $this->password],
        ];
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
