<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('b.login');
})->name('logout');

Route::get('/b-login', [LoginController::class, 'index'])->name('b.login');

Route::get('/receive-incoming-coil', function () {
    return view('modules.receive-incoming-coil');
})->name('receive-incoming-coil')->middleware('auth');

Route::get('/inventory-check', function () {
    return view('modules.inventory-check');
})->name('inventory-check')->middleware('auth');
