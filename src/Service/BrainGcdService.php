<?php

namespace Brain\Games\Cli\Service;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\Question;
use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceAbstract;
use Brain\Games\Cli\Service\BrainEvenService;

class BrainGcdService extends BrainGamesServiceAbstract
{
    public const DESCRIPTION = "Find the greatest common divisor of given numbers.";

    public function generateGame(): Game
    {
        $num1 = rand(Game::MIN_NUMBER, Game::MAX_NUMBER);
        $num2 = rand(Game::MIN_NUMBER, Game::MAX_NUMBER);
        $allDividersNum1 = $this->getAllDividers($num1);
        $allDividersNum2 = $this->getAllDividers($num2);
        $intersect = array_intersect($allDividersNum1, $allDividersNum2);

        if (count($intersect) === 0) {
            return $this->generateGame();
        }

        sort($intersect, SORT_NUMERIC);
        $expression = "${num1} ${num2}";
        $correctAnswer = array_pop($intersect);

        $this->gameDTO->setQuestion($expression);
        $this->gameDTO->setCorrectAnswer($correctAnswer);

        return $this->gameDTO;
    }

    private function getAllDividers(int $number): array
    {
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
    }
}
