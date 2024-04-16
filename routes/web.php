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

$router->get('/anggota', 'AnggotaController@index');
$router->get('/anggota/{id}', 'AnggotaController@show');
$router->post('/anggota', 'AnggotaController@store');
$router->put('/anggota/{id}', 'AnggotaController@update');
$router->delete('/anggota/{id}', 'AnggotaController@delete');

$router->get('/api/peminjaman', 'PeminjamanController@index');
$router->post('/api/peminjaman', 'PeminjamanController@store');
$router->put('/api/peminjaman/{id}', 'PeminjamanController@update');
$router->get('/api/peminjaman/{id}', 'PeminjamanController@show');
$router->delete('/api/peminjaman/{id}', 'PeminjamanController@delete');
