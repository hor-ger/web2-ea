<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;

Route::get('/', function () { return view('fooldal'); })->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {return Inertia::render('dashboard');})->name('dashboard');
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });
Route::get('kinalat', function () { return view('kinalat'); });
Route::get('kapcsolat', function () { return view('kapcsolat'); });
Route::get('diagram', function () { return view('diagram'); });
Route::get('uzenetek', function () { return view('uzenetek'); });
Route::get('crud', function () { return view('crud'); });

