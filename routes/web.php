<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;


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
Route::get('/sessions', [SessionController::class, 'index'])->name('index');
Route::post('/sessions/terminate-all', [SessionController::class, 'terminateAll'])->name('sessions.terminateAll');
Route::post('/sessions/{session}/terminate', [SessionController::class, 'terminate'])->name('sessions.terminate');
