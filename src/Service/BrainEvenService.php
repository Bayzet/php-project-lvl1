<?php

namespace Brain\Games\Cli\Service;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceAbstract;

class BrainEvenService extends BrainGamesServiceAbstract
{
    public const DESCRIPTION = 'Answer %R"yes" %Wif the number is even, otherwise answer %R"no"%W.%n';

    public function generateGame(): Game
    {
        $number = rand(Game::MIN_NUMBER, Game::MAX_NUMBER);
        $isEven = $number % 2 ? 'no' : 'yes';

        $this->gameDTO->setQuestion($number);
        $this->gameDTO->setCorrectAnswer($isEven);

        return $this->gameDTO;
    }
}
