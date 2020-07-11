<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function run($translator)
{
    line($translator->trans('Welcome to the Brain Game!'));
    $name = prompt($translator->trans('May I have your name?'));
    line($translator->trans('Hello, %username%!', ['%username%' => $name]));
}
