<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [App\Http\Controllers\User\UserController::class, 'index'])->name('index')->middleware(['auth']);

Route::get('login', [App\Http\Controllers\User\UserController::class, 'showLoginForm'])->name('showlogin');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('store', [App\Http\Controllers\User\UserController::class, 'store'])->name('store');
Route::get('/{username}', [App\Http\Controllers\User\UserController::class, 'show'])->name('show')->middleware(['auth']);
Route::delete('/{username}', [App\Http\Controllers\User\UserController::class, 'destroy'])->name("destroy")->middleware(['auth']);
Route::put('/{username}', [App\Http\Controllers\User\UserController::class, 'update'])->name("update")->middleware(["auth"]);
