<?php

namespace arthuratul\ChuckNorrisJokes\Tests;

use arthuratul\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_a_random_jokes()
    {
        $jokes = new JokeFactory([
            'it should return a random joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('it should return a random joke', $joke);
    }

    /**
     * @test
     */
    public function it_returns_a_predefined_jokes()
    {
        $chuckNorrisJokes = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'If you spell Chuck Norris in Scrabble, you win. Forever.',
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }
}
