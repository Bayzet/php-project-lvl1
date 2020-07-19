<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function playCalc()
{
    $rules = 'What is the result of the expression?';
    $game = function () {
        $num1 = rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operatorNumber = rand(1, 3);
        switch ($operatorNumber) {
            case 1:
                $expression = "${num1} + ${num2}";
                $correctAnswer = $num1 + $num2;
                break;
            case 2:
                $expression = "${num1} - ${num2}";
                $correctAnswer = $num1 - $num2;
                break;
            case 3:
                $expression = "${num1} * ${num2}";
                $correctAnswer = $num1 * $num2;
                break;
        }

        return [$expression, $correctAnswer];
    };

    run($rules, $game);
}
