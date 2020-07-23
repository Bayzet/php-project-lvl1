<?php

namespace Brain\Games\Core;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function run($gameDescriptionRules, $game)
{
    line('Welcome to the Brain Game!');
    line($gameDescriptionRules);
    line();
    $username = prompt('May I have your name?');
    line('Hello, %s!', $username);
    line();
    for ($round = 0; $round !== MAX_ROUNDS; $round++) {
        [$question, $correctAnswer] = $game();
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer != $correctAnswer) {
            line('%R"%s"%W is wrong answer ;(. Correct answer was %R"%s"%W.%n', $userAnswer, $correctAnswer);
            line('Let\'s try again, %s!', $username);
            exit;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $username);
}
