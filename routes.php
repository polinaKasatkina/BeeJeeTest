<?php

use Illuminate\Routing\Router;

/** @var $router Router */

$router->get('/', 'App\Controllers\HomeController@index');

$router->get('/sort_by/{field}/{param}', 'App\Controllers\HomeController@sortBy');

$router->get('/new', 'App\Controllers\TasksController@add');
$router->post('/new', 'App\Controllers\TasksController@create');


$router->get('/login', 'App\Controllers\AuthController@index');
$router->post('/login', 'App\Controllers\AuthController@login');

$router->get('/logout', 'App\Controllers\AuthController@logout');

$router->get('/dashboard', 'App\Controllers\AdminController@index');
$router->get('/dashboard/task/{id}', 'App\Controllers\TasksController@edit');
$router->post('/dashboard/task/{id}/update', 'App\Controllers\TasksController@update');
