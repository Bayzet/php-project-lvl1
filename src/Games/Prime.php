<?php

namespace Brain\Games\Cli\Prime;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function genRoundData()
{
    $question = rand(MIN_NUMBER, MAX_NUMBER);
    $isPrime = function ($number, $counter = 2) use (&$isPrime) {
        if ($counter > $number / 2) {
            return true;
        }

        if ($number % $counter === 0) {
            return false;
        }

        return $isPrime($number, ++$counter);
    };

    $correctAnswer = $isPrime($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function play()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    run($task, fn() => genRoundData());
}
