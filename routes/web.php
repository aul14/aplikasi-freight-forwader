<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::resource('/users', UserController::class);
	Route::resource('/modules', ModuleController::class);
	Route::resource('/roles', RoleController::class);
	Route::resource('/permissions', PermissionController::class);
	Route::get('/roles_access/{id}', [RoleController::class, 'roles_access'])->name('roles.access');
	Route::post('attach-permission/{role_id}', [PermissionController::class, 'attachPermission'])->name('permission.attach');
	Route::post('detach-permission/{role_id}', [PermissionController::class, 'detachPermission'])->name('permission.detach');
	Route::get('users/{user}/update-password', [UserController::class, 'reset_password'])->name('reset.password');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
});
