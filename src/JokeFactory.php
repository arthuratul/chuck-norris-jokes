<?php

namespace arthuratul\ChuckNorrisJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    protected $client;
    protected const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    public function __construct($client = null)
    {
        $this->client = $client ?? new Client();
    }

    public function getRandomJoke(): string
    {
        $response = $this->client->get(self::API_ENDPOINT);
        $joke = json_decode($response->getBody()->getContents());
        return $joke->value->joke;
    }
}
