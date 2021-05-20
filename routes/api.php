<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LocationController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('provinces', [LocationController::class , 'provinces'])->name('api-provinces');
Route::get('regencies/{provinces_id}', [LocationController::class ,'regencies'])->name('api-regencies');
Route::get('districts/{regencies_id}', [LocationController::class , 'districts'])->name('api-districts');
Route::get('villages/{districts_id}', [LocationController::class, 'villages'])->name('api-villages');

