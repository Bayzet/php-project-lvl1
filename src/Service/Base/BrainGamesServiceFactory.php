<?php

namespace Brain\Games\Cli\Service\Base;

use Brain\Games\Cli\Service\BrainEvenService;
use Symfony\Component\Translation\Translator;

class BrainGamesServiceFactory
{


    public static function getBrainService(string $gameName, Translator $translator): BrainGamesServiceInterface
    {
        $gameServiceClassName = 'Brain\Games\Cli\Service\\' . $gameName . 'Service';

        return new $gameServiceClassName($translator);
    }
}
