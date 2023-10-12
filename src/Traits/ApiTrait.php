<?php

namespace ArdaGnsrn\WordPress\Traits;

use ArdaGnsrn\WordPress\Contracts\WordPressAuth;
use ArdaGnsrn\WordPress\Exceptions\WordPressException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

trait ApiTrait
{
    abstract protected function getWordPressAuth(): WordPressAuth;

    protected function getClient(): Client
    {
        if (isset($this->client)) {
            return $this->client;
        }
        $this->client = new Client([
            'base_uri' => $this->getWordPressAuth()->getHost(),
            ...$this->getWordPressAuth()->getClientOptions(),
        ]);

        return $this->client;
    }

    protected function request(string $method, string $restRoute, array $options = [])
    {
        $restRoute = '/wp/v2/'.$restRoute;
        try {
            $response = static::getClient()->request($method, '', [
                ...$options,
                'query' => [
                    'rest_route' => $restRoute,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents(), true);
            throw new WordPressException(
                $response['message'],
                isset($response['code']) ? intval($response['code']) : 0,
                $exception
            );
        }
    }
}
