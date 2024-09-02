<?php

use App\Http\Controllers\Admin\AsignarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('user', UserController::class)->names('admin.user');
Route::resource('roles', RolController::class)->names('admin.roles');
Route::resource('asignar', AsignarController::class)->names('admin.asignar');
Route::resource('permisos', PermisoController::class)->names('admin.permisos');