<?php

namespace ArdaGnsrn\WordPress;

use ArdaGnsrn\WordPress\Contracts\WordPressAuth;
use ArdaGnsrn\WordPress\Traits\References\Post;

class WordPress extends WordPressReference
{
    use Post;

    protected static function getWordPressAuth(): WordPressAuth
    {
        return app(WordPressAuth::class);
    }
}
