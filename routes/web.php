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
$router->post('/matches', 'MatchController@store');
$router->patch('/matches/{id}', 'MatchController@update');
$router->delete('/matches/{id}', 'MatchController@delete');

// For ClubController
$router->get('/clubs', 'ClubController@get');
$router->get('/clubs/{id}/tickets', 'ClubController@getTicketsByClub');

// For TicketController
$router->get('/tickets', 'TicketController@get');
$router->post('/tickets', 'TicketController@store');
$router->patch('/tickets/{id}', 'TicketController@update');
$router->delete('/tickets/{id}', 'TicketController@delete');

// For PurchaseController
$router->get('/purchases', 'PurchaseController@get');
$router->get('/purchases/users/{id}', 'PurchaseController@getByUser');
$router->post('/purchases', 'PurchaseController@store');

// For SubscriptionController
$router->get('/subscriptions/users/{id}', 'SubscriptionController@getByUser');
$router->post('/subscriptions', 'SubscriptionController@store');
