<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ArController;

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
Route::get('/kapcsolat', function () {
    return view('kapcsolat');
})->name('kapcsolat');

Route::post('/uzenet-kuldes', function (Request $request) {
    $validated = $request->validate([
        'nev' => ['required', 'string', 'max:255'],
        'targy' => ['required', 'string', 'max:255'],
        'uzenet' => ['required', 'string', 'max:255'],
    ], [
        'required' => 'A(z) :attribute mező kitöltése kötelező!',
        'max' => 'A mező legfeljebb :max karakter hosszú lehet!',
    ]);

    DB::table('uzenetek')->insert([
        'nev' => $validated['nev'],
        'targy' => $validated['targy'],
        'uzenet' => $validated['uzenet'],
        'ido' => now(),
    ]);


    return redirect()->route('kapcsolat')->with('siker', 'Az üzenetet sikeresen elküldtük.');
})->name('uzenet.tarolas');

Route::get('/diagram', function () {
    $adatok = DB::table('suti')
        ->select('tipus', DB::raw('count(*) as darab'))
        ->groupBy('tipus')
        ->get();

    $labels = $adatok->pluck('tipus');
    $data = $adatok->pluck('darab');

    return view('diagram', [
        'labels' => $labels,
        'data' => $data,
    ]);
})->name('diagram');

Route::get('/uzenetek', function () {
    $uzenetek = DB::table('uzenetek')
        ->orderBy('ido', 'desc')
        ->get();

    return view('uzenetek', [
        'uzenetek' => $uzenetek,
    ]);
})->name('uzenetek');


// CRUD főoldal
Route::get('/crud', [ArController::class, 'crud'])->name('crud');

// CRUD create
Route::get('/arak/create', [ArController::class, 'create'])->name('arak.create');
Route::post('/arak', [ArController::class, 'store'])->name('arak.store');

// CRUD edit
Route::get('/arak/{id}/edit', [ArController::class, 'edit'])->name('arak.edit');
Route::put('/arak/{id}', [ArController::class, 'update'])->name('arak.update');

// CRUD Törlés
Route::delete('/arak/{id}', [ArController::class, 'destroy'])->name('arak.destroy');

