<?php

namespace Brain\Games\Cli\Controller;

use Brain\Games\Cli\Controller\Base\BrainGamesAbstract;

use function cli\line;
use function cli\prompt;

class BrainEven extends BrainGamesAbstract
{
    private const MAX_CORRECT_ANSWER = 3;
    private const YES_ANSWER = 'yes';

    public function run(): void
    {
        line($this->translator->trans('Answer %R"yes" %Wif the number is even, otherwise answer %R"no"%W.%n'));
        line();
        $username = prompt($this->translator->trans('May I have your name?'));
        $this->user->setName($username);
        line($this->translator->trans('Hello, %username%!', ['%username%' => $this->user->getName()]));
        line();
        do {
            $number = $this->service->getRandomNumber();
            line($this->translator->trans('Question: %number%', ['%number%' => $number]));
            $userAnswer      = prompt($this->translator->trans('Your answer'));
            $isCorrectAnswer = $this->service->isCorrectAnswer($userAnswer, $number);
            if ($isCorrectAnswer) {
                line($this->translator->trans('Correct!'));
                $this->service->increaseSuccess($this->user);
            } else {
                if ($userAnswer === self::YES_ANSWER) {
                    line($this->translator->trans('%R"yes" %W is wrong answer ;(. Correct answer was %R"no"%W.%n'));
                } else {
                    line($this->translator->trans('%R"no" %W is wrong answer ;(. Correct answer was %R"yes"%W.%n'));
                }
                line($this->translator->trans('Let\'s try again, %username%!', [
                    '%username%' => $this->user->getName()
                ]));
                exit;
            }
        } while ($this->user->getSuccess() < self::MAX_CORRECT_ANSWER);

        line($this->translator->trans('Congratulations, %username%!', ['%username%' => $this->user->getName()]));
    }
}
