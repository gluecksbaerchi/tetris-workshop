<?php

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

$router->get('/objects', 'ObjectController@showObjects');
$router->get('/objects/{id}', 'ObjectController@showObject');
$router->post('/objects', 'ObjectController@createObject');
$router->put('/objects', 'ObjectController@moveObject');
