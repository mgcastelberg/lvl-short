<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/manual', function () {
        return view('manual');
    })->name('qr_code');
    Route::get('/mock', function () {
        return view('mock');
    })->name('mock');
});

Route::get('/{shortLink}', [ShortLinkController::class, 'index'])->name('shortlink.show');
