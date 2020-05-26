<?php

namespace arthuratul\ChuckNorrisJokes;

class JokeFactory
{
    protected $chuckNorrisJokes = [
        'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
        'Time waits for no man. Unless that man is Chuck Norris.',
        'If you spell Chuck Norris in Scrabble, you win. Forever.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->chuckNorrisJokes = $jokes;
        }

    }

    public function getRandomJoke(): string
    {
        return $this->chuckNorrisJokes[array_rand($this->chuckNorrisJokes)];
    }
}
