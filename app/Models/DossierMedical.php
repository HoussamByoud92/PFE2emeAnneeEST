<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;

    protected $table = 'dossiermedical';

    protected $fillable = [
        'poids',
        'taille',
        'groupe_sanguin',
        'antecedent_perso_familiaux',
        'examen_digestif',
        'examen_cardio_vasculaire',
        'examen_pluro_pulmonaire',
        'examen_neurologique',
        'examen_urologique',
        'examen_dermatologique',
        'aires_gonglionnaire',
        'examen_sanguin',
        'etat_vaccinal',
        'conclusion',
        'date',
        'medecin',
        'id_benef'
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benef');
    }
}
