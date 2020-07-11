<?php

namespace Brain\Games\Cli\Controller\Base;

use Brain\Games\Cli\DTO\User;
use Brain\Games\Cli\Service\Base\BrainGamesServiceFactory;
use Brain\Games\Cli\Service\Base\BrainGamesServiceInterface;
use Symfony\Component\Translation\Translator;

use function cli\line;

abstract class BrainGamesAbstract implements BrainGamesInterface
{
    protected Translator $translator;

    protected BrainGamesServiceInterface $service;

    public User $user;


    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
        $this->service   = BrainGamesServiceFactory::getBrainService($this->getGameName(), $translator);
        $this->user      = new User();

        line($translator->trans('Welcome to the Brain Game!'));
    }


    public function run(): void
    {
        // TODO: Implement run() method.
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getGameName(): string
    {
        $explode = explode('\\', get_called_class());
        $gameName = array_pop($explode);

        if (!is_string($gameName)) {
            throw new \Exception('Failed to highlight game name');
        }

        return $gameName;
    }
}
