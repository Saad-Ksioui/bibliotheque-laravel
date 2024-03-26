<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = DB::table('livres')
            ->join('auteurs', 'livres.auteur_id', '=', 'auteurs.id')
            ->select('livres.id', 'livres.titre', 'livres.anneepub', 'livres.nbrpages', 'auteurs.nom')
            ->paginate(3);

        return view('Biblio.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = DB::table('auteurs')->get();
        return view('Biblio.createLivre', compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newLivre = $request->validate([
            'titre' => 'required|string',
            'anneepub' => 'required|integer',
            'nbrpages' => 'required|integer',
            'auteur_id' => 'required',
        ]);

        DB::table('livres')->insert($newLivre);
        return redirect()->route('livre.index')->with('success', 'Creation de livre avec success');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $livre = DB::table('livres')->wheres('id', $id)->first();
        return view('Biblio.edit', compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
