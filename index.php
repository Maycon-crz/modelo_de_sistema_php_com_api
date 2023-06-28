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
$router->get("/user", "UserController:dashboard");

/**
 * API
 */
$router->group("/api");
$router->post("/createsession", "AuthenticationController:createSession");
$router->post("/login", "AuthenticationController:loginController");
$router->post("/logout", "AuthenticationController:logoutController");
$router->post("/user_registration", "AuthenticationController:userRegistrationController");
$router->post("/post/{section}", "UserController:post");

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