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

Route::prefix('company')->group(function () {
    Route::get('/{id}', [Controllers\CompanyController::class, 'show']);

    Route::post('/{id}/addComment', [Controllers\CompanyController::class, 'addComment'])->middleware(['auth.company']);

    Route::middleware(['auth.company.self'])->group(function () {
        Route::get('/{id}/delete', [Controllers\CompanyController::class, 'delete']);
        Route::post('/{id}/saveDesc', [Controllers\CompanyController::class, 'saveDesc']);
        Route::post('/{id}/savePhoto', [Controllers\CompanyController::class, 'savePhoto']);
        Route::get('/{id}/deleteEmployee/{emp_id}', [Controllers\CompanyController::class, 'deleteEmployee']);
        Route::post('/{id}/editEmployee/{emp_id}', [Controllers\CompanyController::class, 'editEmployee']);
        Route::post('/{id}/addEmployee', [Controllers\CompanyController::class, 'addEmployee']);
    });

});


Route::post('/login', [Controllers\CompanyController::class, 'login'])->name('login');
Route::post('/logout', [Controllers\CompanyController::class, 'logout'])->name('logout');
