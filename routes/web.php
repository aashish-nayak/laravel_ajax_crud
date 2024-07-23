<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $roles = Role::get();
    return view('welcome', compact('roles'));
});
