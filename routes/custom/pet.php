<?php

use Illuminate\Support\Facades\Route;

Route::get("/findByStatus", [App\Http\Controllers\Pet\PetController::class, 'findByStatus'])->name("findByStatus");
Route::get("/{id}", [App\Http\Controllers\Pet\PetController::class, 'show'])->name("show");
Route::post("/{id}", [App\Http\Controllers\Pet\PetController::class, 'update'])->name('update');
Route::delete("/{id}", [App\Http\Controllers\Pet\PetController::class, 'destroy'])->name('destroy');
Route::get("/", [App\Http\Controllers\Pet\PetController::class, 'index'])->name('index');
Route::post("/", [App\Http\Controllers\Pet\PetController::class, 'store'])->name("store");
Route::get("/{id}/uploadImage", [App\Http\Controllers\Pet\PetController::class, 'showUploadImage'])->name("show-upload-image");
Route::post("/{id}/uploadImage", [App\Http\Controllers\Pet\PetController::class, 'uploadImage'])->name("upload-image");
