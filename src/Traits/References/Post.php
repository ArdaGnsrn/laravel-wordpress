<?php

namespace ArdaGnsrn\WordPress\Traits\References;

use ArdaGnsrn\WordPress\Exceptions\WordPressException;

trait Post
{
    /**
     * Get posts.
     *
     * @return mixed
     * @throws WordPressException
     */
    public function getPosts()
    {
        return $this->request('GET', 'posts');
    }

    /**
     * Create post.
     *
     * @param array $data
     * @return mixed
     * @throws WordPressException
     */
    public function createPost(array $data)
    {
        return $this->request('POST', 'posts', [
            'json' => $data,
        ]);
    }

    public function getPost(int $id)
    {
        return $this->request('GET', "posts/{$id}");
    }

    public function updatePost(int $id, array $data)
    {
        return $this->request('POST', "posts/{$id}", [
            'json' => $data,
        ]);
    }

    public function deletePost(int $id)
    {
        return $this->request('DELETE', "posts/{$id}");
    }
}
