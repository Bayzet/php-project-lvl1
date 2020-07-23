<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

const PROGRESSION_LENGTH = 10;

function generationGameProgression()
{
    $first = rand(1, 50);
    $difference = rand(1, 50);

    $progressionList = getProgression($first, $difference, PROGRESSION_LENGTH);

    $hideNumIndex = rand(0, PROGRESSION_LENGTH - 1);
    $correctAnswer = $progressionList[$hideNumIndex];
    $progressionList[$hideNumIndex] = '..';
    $question = implode(' ', $progressionList);

    return [$question, $correctAnswer];
}

function getProgression($first, $difference, $length)
{
    $progressionList = [$first];
    for ($i = 0; $length >= $i; $i++) {
        $progressionList[] = $progressionList[$i] + $difference;
    }

    return $progressionList;
}

function playProgression()
{
    $rules = 'What number is missing in the progression?';

    run($rules, fn() => generationGameProgression());
}
