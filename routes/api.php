<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControl;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Crudcon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProviapakah "Masalah" dalam penelitian itu der within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/users', [AuthControl::class, 'index'] );
// Route::post('/users', [AuthControl::class, 'store'] );
// Route::get('/users/{id}', [AuthControl::class, 'show'] );
// Route::delete('/users/{id}', [AuthControl::class, 'destroy'] );
// Route::get('/users/{id}', [AuthControl::class, 'update'] );
// Route::post('/users/photo/{id}', [UserController::class, 'upload'] );

Route::get('/home',[Crudcon::class, 'index']);
Route::post('/home',[Crudcon::class, 'store']);
Route::get('/home/edit/{id}',[Crudcon::class, 'show']);
Route::put('/home/{id}',[Crudcon::class, 'update']);
Route::delete('/home/{id}',[Crudcon::class, 'destroy']);


