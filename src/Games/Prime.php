<?php

namespace Brain\Games\Cli\Prime;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function genRoundData()
{
    $question = rand(MIN_NUMBER, MAX_NUMBER);
    $correctAnswer = isPrime($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    $iter = function ($counter = 2) use (&$iter, $number) {
        if ($counter > $number / 2) {
            return true;
        }

        if ($number % $counter === 0) {
            return false;
        }

        return $iter(++$counter);
    };

    return $iter();
}

function play()
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    run($task, fn() => genRoundData());
}
