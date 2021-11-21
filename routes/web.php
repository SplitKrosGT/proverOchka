<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get("api/contacts", "ContactController@showAll");
$router->post("api/contacts/add", "ContactController@add");
$router->post("api/contacts/{contact_id}/delete", "ContactController@delete");
$router->post("api/contacts/{contact_id}/find", "ContactController@find");

$router->post("api/phones/add", "PhoneController@add");