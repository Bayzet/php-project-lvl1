<?php

namespace Brain\Games\Cli\Controller\Base;

use Symfony\Component\Translation\Translator;

interface BrainGamesInterface
{

    /**
     * BrainGamesInterface constructor.
     *
     * @param Translator $translate
     */
    public function __construct(Translator $translate);


    /**
     * @return void
     */
    public function run(): void;


    /**
     * @return string
     */
    public function getGameName(): string;
}
