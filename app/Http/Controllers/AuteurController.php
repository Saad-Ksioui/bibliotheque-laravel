<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuteurController extends Controller
{
    public function index()
    {
        $auteurs = Auteur::with('livres')->paginate(3);

        return view('Biblio.listerAuteur', compact('auteurs'));
    }
    public function create()
    {
        return view('Biblio.createAuteur');
    }
    public function store(Request $request)
    {
        $newAuteur = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
        ]);
        DB::table('auteurs')->insert($newAuteur);

        $auteurs = Auteur::with('livres')->paginate(3);

        return redirect()->route('auteur.index')->with(compact('auteurs'));
    }

    public function edit($id)
    {
        $auteur = DB::table('auteurs')->where('id', '=', $id)->first();
        return view('Biblio.editAuteur', compact('auteur'));
    }

    public function update(Request $request, $id)
    {
        $newAuteur = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
        ]);
        DB::table('auteurs')->where('id', '=', $id)->update($newAuteur);

        return redirect()->route('auteur.index')->with('success', 'Modification avec success');
    }

    public function delete($id)
    {
        DB::table('auteurs')->where('id','=', $id)->delete();
        if (DB::table('auteurs')->count() === 0) {
            DB::table('auteurs')->truncate();
        }
        return redirect()->route('auteur.index')->with('success', 'Suppression avec success');
    }
}
