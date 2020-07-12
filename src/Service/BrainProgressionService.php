<?php

namespace Brain\Games\Cli\Service;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceAbstract;

class BrainProgressionService extends BrainGamesServiceAbstract
{
    public const DESCRIPTION = 'What number is missing in the progression?';
    public const PROGRESSION_LENGTH = 10;


    public function generateGame(): Game
    {
        $num1 = rand(1, 50);
        $step = rand(1, 50);
        $progression = $this->generateProgression($num1, $step, self::PROGRESSION_LENGTH);

        $hideNumIndex = rand(0, self::PROGRESSION_LENGTH - 1);
        $correctAnswer = $progression[$hideNumIndex];
        $progression[$hideNumIndex] = '..';
        $question = implode(' ', $progression);

        $this->gameDTO->setQuestion($question);
        $this->gameDTO->setCorrectAnswer($correctAnswer);

        return $this->gameDTO;
    }

    private function generateProgression(int $num1, int $step, int $length): array
    {
        $progression = function ($counter, $acc, $n) use ($step, $length, &$progression) {
            if ($counter > $length) {
                return $acc;
            }
            $acc[] = $n;

            return $progression(++$counter, $acc, $n + $step);
        };

        return $progression(1, [], $num1);
    }
}
