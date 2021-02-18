<?php
use \Illuminate\Http\Request;
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

// $router->get('/coba', function(){
//     return 'sulses';
// });

$router->group(['namespace' => 'V1', 'prefix' => 'categories'], function() use($router){

    $router->get('/', 'CategoryController@index');
    $router->get('/detail/{id}', 'CategoryController@detail');
    $router->post('/input', 'CategoryController@input');
    $router->put('update/{id}', 'CategoryController@update');
    $router->delete('/del/{id}', 'CategoryController@deleteData');
});

$router->group(['namespace' => 'V1', 'prefix' => 'books'], function() use($router){

    $router->get('/', 'BookController@index');
    $router->get('/cat/{id}', 'BookController@getByCat');
    $router->get('/id/{id}', 'BookController@getById');
    $router->post('/input', 'BookController@input');
    $router->put('update/{id}', 'BookController@update');
    $router->delete('/del/{id}', 'BookController@deleteData');
     $router->put('/borrow/{id}', 'BookController@borrow');
     $router->put('/back/{id}', 'BookController@back');

});

$router->group(['namespace' => 'V1', 'prefix' => 'user'], function() use($router){

    $router->post('/reg', 'UserController@regist');
    $router->put('/up/{id}', 'UserController@update');
    $router->delete('/del/{id}', 'UserController@delete');
    $router->post('/login', 'UserController@login');
    $router->delete('/logout', 'userController@logout');

});









