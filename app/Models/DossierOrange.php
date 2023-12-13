<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierOrange extends Model
{
    use HasFactory;

    protected $table = 'dossierorange';

    protected $fillable = [
        'certificat_vie_collectif',
        'engagement_tuteur',
        'fiche_scolaire',
        'id_benef'
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benef');
    }
}
