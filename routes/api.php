<?php

use App\Http\Controllers\UrlController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['prefix' => 'url'], function () use ($router) {
    $router->post('/', [UrlController::class, 'store']);
    $router->get('/', [UrlController::class, 'index']);
    $router->get('/{id}', [UrlController::class, 'show']);
    $router->put('/{id}', [UrlController::class, 'update']);
    $router->delete('/{id}', [UrlController::class, 'destroy']);
});
