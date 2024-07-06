<?php

use App\Http\Controllers\AutoResponderController;
use App\Http\Controllers\FryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    return redirect('/admin');
});

Route::get('/test', function () {
    $user = User::first();
    dd($user->getRoleNames()->first());
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    });

    Route::get('/admin/auth/setting', function () {
        return view('auth-setting');
    });

    Route::prefix('admin')->group(function () {
        Route::resource('setting_chat', AutoResponderController::class);
        Route::resource('fry', FryController::class);

        Route::prefix('auth')->group(function () {
            Route::resource('users', UserController::class)->except('store', 'update');
            Route::resource('roles', RoleController::class)->except('store', 'update');
        });

    });


});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
