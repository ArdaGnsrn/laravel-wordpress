<?php

namespace ArdaGnsrn\WordPress\Traits;

trait WPAuthTrait
{
    protected string $host;

    public function __construct(...$params)
    {
        $this->host = config('wordpress.host');
        $this->init(...$params);
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public static function create(string $host = null, string $username = null, string $password = null): self
    {
        return new static($host, $username, $password);
    }
}
