<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;

    protected $fillable = [
        "nom",
        "prenom",
        "username",
        "email",
        "password"
    ];


}
