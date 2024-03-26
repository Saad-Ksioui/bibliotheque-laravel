<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuteurController extends Controller
{
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

        $auteurs = DB::table('auteurs')->get();
        return view('Biblio.createLivre', compact('auteurs'));
    }
}
