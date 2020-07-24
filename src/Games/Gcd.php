<?php

namespace Brain\Games\Cli\Gcd;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

const MINIMUM_ACCEPTABLE_VALUE = 3;

function genRoundData()
{
    $num1 = rand(MIN_NUMBER, MAX_NUMBER);
    $num2 = rand(MIN_NUMBER, MAX_NUMBER);
    $commonGreatestDivisor = getCommonGreatestDivisor($num1, $num2);

    if ($commonGreatestDivisor < MINIMUM_ACCEPTABLE_VALUE) {
        return genRoundData();
    }

    $question = "${num1} ${num2}";
    $correctAnswer = $commonGreatestDivisor;

    return [$question, $correctAnswer];
}

function getCommonGreatestDivisor($number1, $number2)
{
    $lessNumber = min([$number1, $number2]);
    $moreNumber = max([$number1, $number2]);

    for ($divisor = $lessNumber; $divisor > 0; $divisor--) {
        if (($lessNumber % $divisor === 0) and  ($moreNumber % $divisor === 0)) {
            return $divisor;
        }
    }
}

function play()
{
    $task = 'Find the greatest common divisor of given numbers.';

    run($task, fn() => genRoundData());
}
