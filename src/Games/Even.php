<?php

namespace Brain\Games\Cli\Even;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function genRoundData()
{
    $question = rand(MIN_NUMBER, MAX_NUMBER);
    $correctAnswer = isEven($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isEven($number)
{
    return $number % 2 === 0;
}

function play()
{
    $task = 'Answer %R"yes" %Wif the number is even, otherwise answer %R"no"%W.%n';

    run($task, fn() => genRoundData());
}
