<?php

use App\Http\Controllers\AutoResponderController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    dd(config('app.env'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:dashboard');


    Route::prefix('admin')->group(function () {
        Route::resource('autoresponders', AutoResponderController::class)->middleware('can:autoresponder-management');
        Route::resource('customer-service', CustomerServiceController::class)->except('show')->middleware('can:customer-service-management');
        Route::resource('fry', FryController::class)->middleware('can:fry-management');

        Route::prefix('auth')->group(function () {
            Route::resource('users', UserController::class)->except('store', 'update')->middleware('can:user-management');
            Route::resource('roles', RoleController::class)->except('store', 'update')->middleware('can:role-management');
//            Route::resource('menus', MenuController::class)->middleware('can:menu-management');
            Route::get('profile', function () {
                return view('users.edit', [
                    'profile' => true,
                    'user' => auth()->user()
                ]);
            })->name('profile.edit');
        });
    });
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
