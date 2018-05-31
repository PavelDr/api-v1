<?php

require __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

try {
    $code = \Core\Factories\CoreFactory::create();
    $code->init();
} catch (Exception $e) {
    $whoops->handleException($e);
}
