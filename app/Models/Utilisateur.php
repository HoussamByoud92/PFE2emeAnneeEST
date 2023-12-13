<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateur';

    protected $fillable = [  
            'nom',
            'prenom',
            'adresse',
            'email',
            'telephone',
            'date_nais',
            'lieu_nais',
            'Username',
            'password',
            'CIN',
            'role'
    ];
}
