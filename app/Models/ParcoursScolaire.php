<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcoursScolaire extends Model
{
    use HasFactory;

    protected $table = 'parcoursscolaire';

    protected $fillable = [
        'annee_sco',
        'moy_s1',
        'moy_s2',
        'moy_ann',
        'etablissement_sco',
        'classe',
        'id_benef'
    ];
    protected $casts = [
        'moy_s1' => 'float',
        'moy_s2' => 'float',
        'moy_ann' => 'float',
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benef');
    }
}
