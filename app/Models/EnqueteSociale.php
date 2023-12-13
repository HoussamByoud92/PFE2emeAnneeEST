<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnqueteSociale extends Model
{
    use HasFactory;

    protected $table = 'enquete_sociale';

    protected $fillable = ['date_enquete',    'adresse_enfant', 'date_naissance',    'lieu_naissance',    'info_enfant',    'nom_prenom',    'niveau_scolaire',    'etat_social',    'etat_sante',    'nbr_frr',    'nbr_soeur',    'tuteur_age',    'tuteur_metier',    'tuteur_sante',    'tuteur_etat',    'etat_scolarite',    'frr_nom',    'frr_date_nais',    'frr_scolarite',    'frr_etat',    'frr_metier',    'origine_geographique',    'type_residence',    'residence',    'nbr_chambre',    'nbr_membre_famille',    'nbr_habitant',    'source_de_vie',    'id_demande'];

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'id_demande');
    }
}
