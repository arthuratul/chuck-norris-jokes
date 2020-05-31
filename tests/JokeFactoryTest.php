<?php

namespace arthuratul\ChuckNorrisJokes\Tests;

use arthuratul\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_a_random_jokes()
    {
        $mock = new MockHandler([
            new Response(200, [],
                '{ "type": "success", "value": { "id": 607, "joke": "Chuck Norris plays pool with comets and astroids. He shoots them into black holes.", "categories": [] } }'),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('Chuck Norris plays pool with comets and astroids. He shoots them into black holes.', $joke);
    }

}
