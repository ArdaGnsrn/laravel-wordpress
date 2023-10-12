<?php

namespace ArdaGnsrn\WordPress\Traits;

trait AuthHostTrait
{
    protected string $host;

    public function __construct()
    {
        $this->host = config('wordpress.host');
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }
}
