<?php

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Src\Controllers\UserController;

$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();
//$container->set(UserController::class, function () use ($container) {
//    return new UserController();
//});

return $container;