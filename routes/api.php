<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::post('/store', [CrudController::class, 'store'])->name('store');
Route::get('/list', [CrudController::class, 'list'])->name('list');