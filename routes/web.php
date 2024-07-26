<?php

use App\Http\Controllers\SoapController;
use Illuminate\Support\Facades\Route;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/sum', [SoapController::class, 'sumQuaternions'])->withoutMiddleware(['web', 'auth']);

Route::post('/subs', [SoapController::class, 'subtractQuaternions'])->withoutMiddleware(['web', 'auth']);

Route::post('/mult', [SoapController::class, 'multiplyQuaternions'])->withoutMiddleware(['web', 'auth']);

Route::post('/conj', [SoapController::class, 'conjugateQuaternion'])->withoutMiddleware(['web', 'auth']);