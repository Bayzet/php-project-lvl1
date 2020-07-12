<?php

namespace Brain\Games\Cli\Service\Base;

use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\User;

interface BrainGamesServiceInterface
{
    public function initializeGameDTO(): Game;

    public function generateGame(): Game;

    public function isCorrectAnswer(string $userAnswer): bool;

    public function increaseRound(): void;
}
