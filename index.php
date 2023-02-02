<?php

require __DIR__ . "/vendor/autoload.php";

$router = new \CoffeeCode\Router\Router(ROOT);

/**
 * APP
 */
$router->namespace("Source\Controllers");

/**
 * web
 */
$router->group(null);
$router->get("/", "WebController:home");
$router->get("/contato", "WebController:contact");

/**
 * ERROR
 */
$router->group("ops");
$router->get("/{errcode}", "WebController:error");

/**
 * PROCESS
 */
$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}