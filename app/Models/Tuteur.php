<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    use HasFactory;

    protected $table = 'tuteur';

    protected $fillable = [
        'nom_prenom',
        'CIN',
        'id_benf'
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benf');
    }

    public function visite()
    {
        return $this->hasMany(Visite::class);
    }
}
