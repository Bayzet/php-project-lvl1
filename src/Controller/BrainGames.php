<?php

namespace Brain\Games\Cli\Controller;

use Brain\Games\Cli\Controller\Base\BrainGamesAbstract;
use Brain\Games\Cli\DTO\Game;
use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceFactory;
use Brain\Games\Cli\Service\Base\BrainGamesServiceInterface;
use Symfony\Component\Translation\Translator;

use function cli\line;
use function cli\prompt;

class BrainGames
{
    public function __construct(Translator $translator, BrainGamesServiceInterface $service)
    {
        $this->translator = $translator;
        $this->service    = $service;
    }

    public function run(): void
    {
        line($this->translator->trans('Welcome to the Brain Game!'));
        $game = $this->service->initializeGameDTO();
        line($this->translator->trans($game->getDescription()));
        line();
        $username = prompt($this->translator->trans('May I have your name?'));
        line($this->translator->trans('Hello, %username%!', ['%username%' => $username]));
        line();
        do {
            $this->service->generateGame();
            line($this->translator->trans('Question: %question%', ['%question%' => $game->getQuestion()]));
            $userAnswer      = prompt($this->translator->trans('Your answer'));
            $isCorrectAnswer = $this->service->isCorrectAnswer($userAnswer);
            if ($isCorrectAnswer) {
                line($this->translator->trans('Correct!'));
                $this->service->increaseRound();
            } else {
                line(
                    $this
                        ->translator
                        ->trans(
                            '%R"%wrong%" %W is wrong answer ;(. Correct answer was %R"%correct%"%W.%n',
                            [
                                '%wrong%' => $userAnswer,
                                '%correct%' => $game->getCorrectAnswer()
                            ]
                        )
                );
                line($this->translator->trans('Let\'s try again, %username%!', [
                    '%username%' => $username
                ]));
                exit;
            }
        } while ($game->getCurrentRound() < Game::MAX_ROUNDS);

        line($this->translator->trans('Congratulations, %username%!', ['%username%' => $username]));
    }
}
