<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
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
})->name('home');
route::get('/login',[AuthManager::Class,'login'])->name('login');
route::post('login',[AuthManager::Class,'loginpost'])->name('login.post');

route::get('/registration',[AuthManager::Class,'registration'])->name('registration');
route::post('/registration',[AuthManager::Class,'registrationpost'])->name('registration.post');

route::get('/logout',[AuthManager::Class,'logout'])->name('logout');