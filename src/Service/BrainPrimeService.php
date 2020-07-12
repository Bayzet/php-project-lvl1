<?php

namespace Brain\Games\Cli\Service;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceAbstract;

class BrainPrimeService extends BrainGamesServiceAbstract
{
    public const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    public function generateGame(): Game
    {
        $number = rand(Game::MIN_NUMBER, Game::MAX_NUMBER);
        $isPrime = function (int $counter = 2) use ($number, &$isPrime) {
            if ($counter > $number / 2) {
                return true;
            }

            if ($number % $counter === 0) {
                return false;
            } else {
                return $isPrime(++$counter);
            }
        };
        $correctAnswer = $isPrime() ? 'yes' : 'no';

        $this->gameDTO->setQuestion($number);
        $this->gameDTO->setCorrectAnswer($correctAnswer);

        return $this->gameDTO;
    }
}
