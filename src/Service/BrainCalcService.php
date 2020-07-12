<?php

namespace Brain\Games\Cli\Service;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\Question;
use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceAbstract;
use Brain\Games\Cli\Service\BrainEvenService;

class BrainCalcService extends BrainGamesServiceAbstract
{
    public function initializeGameDTO(): Game
    {
        $this->gameDTO = new Game();
        $this->gameDTO->setDescription('What is the result of the expression?');

        return $this->gameDTO;
    }

    public function generateGame(): Game
    {
        $num1 = rand(Game::MIN_NUMBER, Game::MAX_NUMBER);
        $num2 = rand(Game::MIN_NUMBER, Game::MAX_NUMBER);
        $rand = rand(1, 3);
        switch ($rand) {
            case 1:
                $expression = "${num1} + ${num2}";
                $correctAnswer = $num1 + $num2;
                break;
            case 2:
                $expression = "${num1} - ${num2}";
                $correctAnswer = $num1 - $num2;
                break;
            case 3:
                $expression = "${num1} * ${num2}";
                $correctAnswer = $num1 * $num2;
                break;
        }

        $this->gameDTO->setQuestion($expression);
        $this->gameDTO->setCorrectAnswer($correctAnswer);

        return $this->gameDTO;
    }
}
