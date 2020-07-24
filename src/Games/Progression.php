<?php

namespace Brain\Games\Cli\Progression;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

const PROGRESSION_LENGTH = 10;

function genRoundData()
{
    $first = rand(1, 50);
    $difference = rand(1, 50);

    $progression = makeProgression($first, $difference, PROGRESSION_LENGTH);

    $hideNumIndex = rand(0, PROGRESSION_LENGTH - 1);
    $correctAnswer = $progression[$hideNumIndex];
    $progression[$hideNumIndex] = '..';
    $question = implode(' ', $progression);

    return [$question, $correctAnswer];
}

function makeProgression($first, $difference, $length)
{
    $progression = [$first];
    for ($i = 0; $length >= $i; $i++) {
        $progression[] = $progression[$i] + $difference;
    }

    return $progression;
}

function play()
{
    $task = 'What number is missing in the progression?';

    run($task, fn() => genRoundData());
}
