<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\CompanyController::class, 'home'])->name('home');
Route::get('/company/{id}', [Controllers\CompanyController::class, 'show']);

Route::get('/company/{id}/delete', [Controllers\CompanyController::class, 'delete']);
Route::post('/company/{id}/saveDesc', [Controllers\CompanyController::class, 'saveDesc']);
Route::post('/company/{id}/savePhoto', [Controllers\CompanyController::class, 'savePhoto']);
Route::post('/company/{id}/addComment', [Controllers\CompanyController::class, 'addComment']);

Route::post('/login', [Controllers\CompanyController::class, 'login'])->name('login');
Route::post('/logout', [Controllers\CompanyController::class, 'logout'])->name('logout');
