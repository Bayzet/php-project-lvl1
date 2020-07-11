<?php

namespace Brain\Games\Cli\Service;

use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceInterface;

class BrainEvenService implements BrainGamesServiceInterface
{


    public function getRandomNumber(): int
    {
        return rand();
    }

    private function isEven(int $number): bool
    {
        return $number % 2 ? false : true;
    }

    private function checkAnswer(string $userAnswer): bool
    {
        return $userAnswer === 'yes';
    }

    public function isCorrectAnswer(string $userAnswer, int $number): bool
    {
        $result = $this->isEven($number) === $this->checkAnswer($userAnswer);

        return $result;
    }

    public function increaseSuccess(User &$user)
    {
        $currentProgress = $user->getSuccess() + 1;
        $user->setSuccess($currentProgress);
    }
}
