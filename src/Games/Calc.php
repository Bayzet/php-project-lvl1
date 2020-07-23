<?php

namespace Brain\Games\Cli;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

function generationGameCalc()
{
    $operators = ['+','-','*'];
    $num1 = rand(MIN_NUMBER, MAX_NUMBER);
    $num2 = rand(MIN_NUMBER, MAX_NUMBER);
    $operator = $operators[rand(0, 2)];
    $question = "${num1} ${operator} ${num2}";
    $correctAnswer = computeArithmeticOperation($num1, $num2, $operator);

    return [$question, $correctAnswer];
}

function computeArithmeticOperation($number1, $number2, $operator)
{
    switch ($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function playCalc()
{
    $rules = 'What is the result of the expression?';

    run($rules, fn() => generationGameCalc());
}
