<?php

use Illuminate\Support\Facades\Route;

Route::post('profile', [\App\Http\Controllers\ProfileController::class, 'createToken'])->name('profile.createToken');
Route::delete('profile', [\App\Http\Controllers\ProfileController::class, 'deleteToken'])->name('profile.deleteToken');
