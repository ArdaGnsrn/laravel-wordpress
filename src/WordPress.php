<?php

namespace ArdaGnsrn\WordPress;

use ArdaGnsrn\WordPress\Contracts\WordPressAuth;
use ArdaGnsrn\WordPress\Traits\ApiTrait;
use ArdaGnsrn\WordPress\Traits\References\Post;
use GuzzleHttp\Client;

class WordPress
{
    use ApiTrait, Post;
    protected WordPressAuth $wordPressAuth;
    protected Client $client;

    public function __construct(WordPressAuth $wordPressAuth = null)
    {
        $this->wordPressAuth = ($wordPressAuth ?? app(WordPressAuth::class));
    }

    public static function create(WordPressAuth $wordPressAuth = null): WordPress
    {
        return new WordPress($wordPressAuth);
    }

    protected function getWordPressAuth(): WordPressAuth
    {
        return $this->wordPressAuth;
    }
}
