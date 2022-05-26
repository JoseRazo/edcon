<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\EstudianteController;
use App\Http\Controllers\Back\UsuarioController;
use App\Http\Controllers\Auth\AdminLoginController;

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

Route::get('/', [DashboardController::class, 'home']);

Route::group(['prefix' => 'admin'], function () {
    Route::middleware('auth:web')->group(static function () {
        Route::get('tablero', [DashboardController::class, 'index'])->name('admin.index');
        
        Route::group(['middleware' => ['role:superadmin|admin']], function () {
            Route::resource('estudiantes', EstudianteController::class);
        });

        Route::group(['middleware' => ['role:superadmin']], function () {
            Route::resource('usuarios', UsuarioController::class);
        });
    });


    //Authentication Routes Aspirantes
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'adminLogin'])->name('admin.login.post');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
