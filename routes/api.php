<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MokeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mock',[MokeController::class, 'index'])->name('mock.index');
Route::get('mock/{name}',[MokeController::class, 'show'])->name('mock.show');
// Route::get('mock', MokeController::class )->name('moke.index');
// Route::get('mock', [MokeController::class, , 'index'] )->name('moke.index');

// Route::resource('categories', CategoryController::class, ['except' =>['creeate','edit']]);
