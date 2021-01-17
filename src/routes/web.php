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

$router->get('/', function () use ($router) {
    return "haha";
});

$router->get('users/init',  ['uses' => 'UserController@init']);


$router->group(['middleware' => 'auth:api'], function () use ($router) {

    //user api
    $router->get('users',  ['uses' => 'UserController@getAll']);

    $router->get('users/{id}', ['uses' => 'UserController@getOne']);

    $router->post('users', ['uses' => 'UserController@create']);

    $router->delete('users/{id}', ['uses' => 'UserController@delete']);

    $router->put('users/{id}', ['uses' => 'UserController@update']);



    //product api
    $router->get('products',  ['uses' => 'ProductController@getAll']);

    $router->get('products/{id}', ['uses' => 'ProductController@getOne']);

    $router->post('products', ['uses' => 'ProductController@create']);

    $router->delete('products/{id}', ['uses' => 'ProductController@delete']);

    $router->put('products/{id}', ['uses' => 'ProductController@update']);



    //subscription api
    $router->get('subscriptions',  ['uses' => 'SubscriptionController@getAll']);

    $router->get('subscriptions/{id}', ['uses' => 'SubscriptionController@getOne']);

    $router->post('subscriptions', ['uses' => 'SubscriptionController@create']);

    $router->delete('subscriptions/{id}', ['uses' => 'SubscriptionController@delete']);

    $router->put('subscriptions/{id}', ['uses' => 'SubscriptionController@update']);



    //activation api
    $router->get('activations/{id}', ['uses' => 'ActivationController@getOne']);

    $router->delete('activations/{id}', ['uses' => 'ActivationController@delete']);

    $router->put('activations/{id}', ['uses' => 'ActivationController@update']);
});

//No  need authentication jwt
$router->get('activations',  ['uses' => 'ActivationController@getAll']);


$router->post('login', 'AuthController@login');
$router->post('users/logout', 'AuthController@logout');
$router->post('refresh', 'AuthController@refresh');
