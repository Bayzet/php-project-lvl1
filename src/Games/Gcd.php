<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function playGcd()
{
    $rules = 'Find the greatest common divisor of given numbers.';
    $game = function () use (&$game) {
        $num1 = rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = rand(MIN_NUMBER, MAX_NUMBER);

        $allDividers = function ($number) {
            $iter = function (int $counter, array $acc = []) use ($number, &$iter) {
                if ($counter >  $number / 2) {
                    $acc[] = $number;
                    return $acc;
                }
                if ($number % $counter === 0) {
                    $acc[] = $counter;
                }

                return $iter(++$counter, $acc);
            };

            return $iter(3);
        };

        $allDividersNum1 = $allDividers($num1);
        $allDividersNum2 = $allDividers($num2);
        $intersect = array_intersect($allDividersNum1, $allDividersNum2);

        if (count($intersect) === 0) {
            return $game();
        }

        sort($intersect, SORT_NUMERIC);
        $expression = "${num1} ${num2}";
        $correctAnswer = array_pop($intersect);

        return [$expression, $correctAnswer];
    };

    run($rules, $game);
}
