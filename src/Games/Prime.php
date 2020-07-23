<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function generationGamePrime()
{
    $question = rand(MIN_NUMBER, MAX_NUMBER);
    $correctAnswer = isPrime($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isPrime($number, $counter = 2)
{
    if ($counter > $number / 2) {
        return true;
    }

    if ($number % $counter === 0) {
        return false;
    }

    return isPrime($number, ++$counter);
}

function playPrime()
{
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    run($rules, fn() => generationGamePrime());
}
