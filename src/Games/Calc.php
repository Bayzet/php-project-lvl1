<?php

namespace Brain\Games\Cli\Calc;

use function Brain\Games\Core\run;

use const Brain\Games\Core\MIN_NUMBER;
use const Brain\Games\Core\MAX_NUMBER;

const OPERATORS = ['+','-','*'];

function genRoundData()
{
    $num1 = rand(MIN_NUMBER, MAX_NUMBER);
    $num2 = rand(MIN_NUMBER, MAX_NUMBER);
    $lastOperatorsKey = array_key_last(OPERATORS);
    $randomOperatorIndex = rand(0, $lastOperatorsKey);
    $operator = OPERATORS[$randomOperatorIndex];
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
        default:
            throw new \Exception("Unknown operator: '${operator}'");
    }
}

function play()
{
    $task = 'What is the result of the expression?';

    run($task, fn() => genRoundData());
}
