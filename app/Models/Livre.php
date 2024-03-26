<?php

namespace App\Models;

use App\Models\Auteur;
use App\Models\Emprunt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'anneepub',
        'nbrpages',
        'auteur_id'
    ];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
