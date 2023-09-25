<?php

Route::get('/order', [App\Http\Controllers\Store\StoreController::class, 'create'])->name('create');
Route::post('/order', [App\Http\Controllers\Store\StoreController::class, 'storage'])->name('store');
Route::get("/order/{id}",[App\Http\Controllers\Store\StoreController::class, 'show'])->name('show');
Route::delete('/order/{id}', [App\Http\Controllers\Store\StoreController::class, 'destroy'])->name("destroy");
