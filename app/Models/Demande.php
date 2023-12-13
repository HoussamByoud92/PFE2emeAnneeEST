<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $table = 'demande';

    protected $fillable = [
        'nom_prenom',
        'CIN',
        'date_expiration',
        'adresse',
        'pere_ou_mere',
        'autre',
        'nom_prenom_enfant',
        'etablissement',
        'cause',
        'orphelinat',
        'violence',
        'exploitation',
        'type_exploitation',
        'lieu_demande',
        'date_demande',
        'demande_version_egalisé',
        'etat',
        'id_benf'
    ];

    public function enqueteSociale()
    {
        return $this->hasOne(EnqueteSociale::class);
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benf');
    }
}
