<?php

namespace Brain\Games\Cli\Service\Base;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\Question;
use Symfony\Component\Translation\Translator;

class BrainGamesServiceAbstract implements BrainGamesServiceInterface
{
    public const DESCRIPTION = null;

    protected Game $gameDTO;

    public function initializeGameDTO(): Game
    {
        $this->gameDTO = new Game();
        $this->gameDTO->setDescription($this::DESCRIPTION);

        return $this->gameDTO;
    }

    public function generateGame(): Game
    {
        // TODO: Implement generateQuestion() method.
    }

    public function isCorrectAnswer(string $userAnswer): bool
    {
        return $userAnswer === $this->gameDTO->getCorrectAnswer();
    }


    public function increaseRound(): void
    {
        $currentRound = $this->gameDTO->getCurrentRound();
        $this->gameDTO->setCurrentRound($currentRound + 1);
    }
}
