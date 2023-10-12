<?php

namespace ArdaGnsrn\WordPress\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ArdaGnsrn\WordPress\WordPress
 */
class WordPress extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ArdaGnsrn\WordPress\WordPress::class;
    }
}
