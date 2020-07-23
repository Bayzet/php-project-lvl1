<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function generationGameEven()
{
    $question = rand(MIN_NUMBER, MAX_NUMBER);
    $correctAnswer = $question % 2 ? 'no' : 'yes';

    return [$question, $correctAnswer];
}

function playEven()
{
    $rules = 'Answer %R"yes" %Wif the number is even, otherwise answer %R"no"%W.%n';

    run($rules, fn() => generationGameEven());
}
