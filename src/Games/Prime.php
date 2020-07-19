<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function playPrime()
{
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $game = function () {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $isPrime = function (int $counter = 2) use ($number, &$isPrime) {
            if ($counter > $number / 2) {
                return true;
            }

            if ($number % $counter === 0) {
                return false;
            }

            return $isPrime(++$counter);
        };
        $correctAnswer = $isPrime() ? 'yes' : 'no';

        return [$number, $correctAnswer];
    };

    run($rules, $game);
}
