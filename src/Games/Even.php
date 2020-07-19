<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function playEven()
{
    $rules = 'Answer %R"yes" %Wif the number is even, otherwise answer %R"no"%W.%n';
    $game = function () {
        $expression = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = $expression % 2 ? 'no' : 'yes';

        return [$expression, $correctAnswer];
    };

    run($rules, $game);
}
