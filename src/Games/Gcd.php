<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

const MINIMUM_ACCEPTABLE_VALUE = 3;

function generationGameGcd()
{
    $num1 = rand(MIN_NUMBER, MAX_NUMBER);
    $num2 = rand(MIN_NUMBER, MAX_NUMBER);
    $commonGreatestDivisor = getCommonGreatestDivisor($num1, $num2);

    if ($commonGreatestDivisor < MINIMUM_ACCEPTABLE_VALUE) {
        return generationGameGcd();
    }

    $question = "${num1} ${num2}";
    $correctAnswer = $commonGreatestDivisor;

    return [$question, $correctAnswer];
}

function getCommonGreatestDivisor($number1, $number2)
{
    $numbers = [$number1, $number2];
    sort($numbers);
    $lessNumber = $numbers[0];
    $moreNumber = $numbers[1];

    for ($divisor = $lessNumber; $divisor > 0; $divisor--) {
        if (($lessNumber % $divisor === 0) and  ($moreNumber % $divisor === 0)) {
            return $divisor;
        }
    }
}

function playGcd()
{
    $rules = 'Find the greatest common divisor of given numbers.';

    run($rules, fn() => generationGameGcd());
}
