<?php

namespace ArdaGnsrn\WordPress\Traits\References;

use ArdaGnsrn\WordPress\WordPressReference;

trait Post
{
    public static function getPosts()
    {
        return WordPressReference::request('GET', 'posts');
    }

    public static function createPost(array $data)
    {
        return WordPressReference::request('POST', 'posts', [
            'json' => $data,
        ]);
    }

    public static function getPost(int $id)
    {
        return WordPressReference::request('GET', "posts/{$id}");
    }

    public static function updatePost(int $id, array $data)
    {
        return WordPressReference::request('POST', "posts/{$id}", [
            'json' => $data,
        ]);
    }

    public static function deletePost(int $id)
    {
        return WordPressReference::request('DELETE', "posts/{$id}");
    }
}
