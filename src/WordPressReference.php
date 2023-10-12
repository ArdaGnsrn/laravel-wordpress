<?php

namespace ArdaGnsrn\WordPress;

use ArdaGnsrn\WordPress\Exceptions\WordPressException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class WordPressReference
{
    protected static Client $client;

    protected static function getClient(): Client
    {
        if (isset(static::$client)) {
            return static::$client;
        }
        static::$client = new Client(WordPress::getWordPressAuth()->getClientOptions());

        return static::$client;
    }

    /**
     * @throws GuzzleException
     * @throws WordPressException
     */
    protected static function request(string $method, string $restRoute, array $options = [])
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
