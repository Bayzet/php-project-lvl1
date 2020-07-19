<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function playProgression()
{
    $rules = 'What number is missing in the progression?';

    $game = function () {
        $length = 10;
        $num1 = rand(1, 50);
        $step = rand(1, 50);

        $generateProgression = function ($counter, $acc, $n) use ($step, $length, &$generateProgression) {
            if ($counter > $length) {
                return $acc;
            }
            $acc[] = $n;

            return $generateProgression(++$counter, $acc, $n + $step);
        };

        $progression = $generateProgression(1, [], $num1);

        $hideNumIndex = rand(0, $length - 1);
        $correctAnswer = $progression[$hideNumIndex];
        $progression[$hideNumIndex] = '..';
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    run($rules, $game);
}
