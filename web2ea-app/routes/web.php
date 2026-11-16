<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/kinalat', function (Request $request) {
    $kereses = $request->input('kereses');

    $kinalat = DB::table('suti')
        ->leftJoin('ar', 'suti.id', '=', 'ar.sutiid')
        ->leftJoin('tartalom', 'suti.id', '=', 'tartalom.sutiid')
        ->select('suti.nev', 'suti.tipus', 'tartalom.mentes', 'ar.ertek')
        ->when($kereses, function ($query, $kereses) {
            return $query->where('suti.nev', 'like', '%' . $kereses . '%');
        })
        ->get();

    return view('kinalat', [
        'kinalat' => $kinalat,
        'kereses' => $kereses,
    ]);
})->name('kinalat');

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
Route::get('kapcsolat', function () { return view('kapcsolat'); });
Route::get('diagram', function () { return view('diagram'); });
Route::get('uzenetek', function () { return view('uzenetek'); });
Route::get('crud', function () { return view('crud'); });

