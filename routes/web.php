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

$router->get('/', 'IndexController@index');

// For AuthController
$router->post('/auth', 'AuthController@auth');

// For UserController
$router->post('/register', 'UserController@store');

// For MatchController
$router->get('/matches', 'MatchController@get');

// For ClubController
$router->get('/clubs', 'ClubController@get');
