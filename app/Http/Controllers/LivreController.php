<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $livres = DB::table('livres')
            ->join('auteurs', 'livres.auteur_id', '=', 'auteurs.id')
            ->select('livres.id', 'livres.titre', 'livres.anneepub', 'livres.nbrpages', 'auteurs.nom', 'auteurs.prenom')
            ->paginate(3);

        return view('Biblio.index', compact('livres', 'user'));
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

        DB::table('livres')->insert([
            'id' => DB::table('livres')->count() + 1,
            'titre' => $newLivre['titre'],
            'anneepub' => $newLivre['anneepub'],
            'nbrpages' => $newLivre['nbrpages'],
            'auteur_id' => $newLivre['auteur_id'],
        ]);
        return redirect()->route('livre.index')->with('success', 'Creation avec success');
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $livre = DB::table('livres')->where('id', '=', $id)->first();
        return view('Biblio.edit', compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $newLivre = $request->validate([
            'titre' => 'required|string',
            'anneepub' => 'required|integer',
            'nbrpages' => 'required|integer',
        ]);
        DB::table('livres')->where('id', '=', $id)->update($newLivre);
        return redirect()->route('livre.index')->with('success', 'Modification avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        DB::table('livres')->where('id', $id)->delete();
        
        return redirect()->route('livre.index')->with('success', 'Suppression avec success');
    }
}
