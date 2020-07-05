<?php
/**
 * In this Bootstrap, the autoload file is connected and the translations are selected
 */
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;

use function cli\line;
use function cli\prompt;

$translateFilesPath = __DIR__.'/../translations/messages.{local}.yaml';

line('Choose language/Выберите язык');
line('[0] - English');
line('[1] - Русский');
$local = prompt('Default [0]English/По умолчанию [0]Английский', 0) ? 'ru' : 'en';

$translator = new Translator($local);
$translator->addLoader('array', new ArrayLoader());
$messages = Yaml::parseFile(str_replace('{local}', $local, $translateFilesPath));
$translator->addResource('array', $messages, $local);
