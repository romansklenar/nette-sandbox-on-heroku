<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

$configurator->setDebugMode(TRUE); // enable for your remote IP
$configurator->enableDebugger(__DIR__ . '/../tmp/log');
$configurator->setTempDirectory(__DIR__ . '/../tmp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
if (file_exists($localConfig = __DIR__ . '/config/config.local.neon')) {
  $configurator->addConfig($localConfig);
}

$container = $configurator->createContainer();

return $container;
