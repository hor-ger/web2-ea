<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArController extends Controller
{
    // Segédfüggvény az admin ellenőrzésre
    private function authorizeAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'ROLE_ADMIN') {
            abort(403, 'Nincs jogosultságod az oldal megtekintéséhez.');
        }
    }

    // A listázó oldal (crud)
    public function crud()
    {
        $this->authorizeAdmin();

        $arak = DB::table('ar')
            ->join('suti', 'ar.sutiid', '=', 'suti.id')
            ->select('ar.id', 'suti.nev as suti_nev', 'ar.ertek', 'ar.egyseg')
            ->get();

        return view('crud', compact('arak'));
    }

    // Új ár felvételéhez a sütemények listázása
    public function create()
    {
        $this->authorizeAdmin();

        $sutik = DB::table('suti')->get();
        return view('create', compact('sutik'));
    }

    // Új ár mentése az adatbázisba
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'sutiid' => 'required|exists:suti,id',
            'ertek' => 'required|numeric',
            'egyseg' => 'required|string|max:50',
        ]);

        DB::table('ar')->insert([
            'sutiid' => $request->sutiid,
            'ertek' => $request->ertek,
            'egyseg' => $request->egyseg,
        ]);

        return redirect()->route('crud')->with('siker', 'Ár sikeresen hozzáadva!');
    }

    // Meglévő ár szerkesztő űrlapjának betöltése
    public function edit($id)
    {
        $this->authorizeAdmin();

        $ar = DB::table('ar')->where('id', $id)->first();
        $sutik = DB::table('suti')->get();

        return view('edit', compact('ar', 'sutik'));
    }

    // Meglévő ár módosításának mentése
    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        $request->validate([
            'sutiid' => 'required|exists:suti,id',
            'ertek' => 'required|numeric',
            'egyseg' => 'required|string|max:50',
        ]);

        DB::table('ar')->where('id', $id)->update([
            'sutiid' => $request->sutiid,
            'ertek' => $request->ertek,
            'egyseg' => $request->egyseg,
        ]);

        return redirect()->route('crud')->with('siker', 'Ár sikeresen módosítva!');
    }

    // Ár törlése az adatbázisból
    public function destroy($id)
    {
        $this->authorizeAdmin();

        DB::table('ar')->where('id', $id)->delete();

        return redirect()->route('crud')->with('siker', 'Ár sikeresen törölve!');
    }
}