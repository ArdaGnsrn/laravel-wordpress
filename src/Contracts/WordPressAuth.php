<?php

namespace ArdaGnsrn\WordPress\Contracts;

interface WordPressAuth
{
    public function getHost(): string;

    public function setHost(string $host): void;

    public function getClientOptions(): array;

    public static function create(string $host = null, string $username = null, string $password = null): self;
}
