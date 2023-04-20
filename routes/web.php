<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


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
    return view('modules.home');
});
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/sessions', [SessionController::class, 'index'])->name('index')->middleware('auth');
Route::delete('/modules/{session}', [SessionController::class, 'destroy'])->name('destroy');
Route::delete('/delete/all', [SessionController::class, 'deleteAll'])->name('deleteAll');
Route::get('/modules/sessions-list', function () {
    return view('modules.sessions-list');
})->middleware('auth');






