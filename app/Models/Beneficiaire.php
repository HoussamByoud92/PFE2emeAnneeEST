<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $table = 'beneficiaire';

    protected $fillable = [
        'nom_prenom',
    ];

    public function demande()
    {
        return $this->hasOne(Demande::class);
    }

    public function tuteur()
    {
        return $this->hasOne(Tuteur::class);
    }

    public function DossierOrange()
    {
        return $this->hasOne(DossierOrange::class);
    }

    public function DossierMedical()
    {
        return $this->hasOne(DossierMedical::class);
    }

    public function infraction()
    {
        return $this->hasMany(Infraction::class);
    }

    public function visite()
    {
        return $this->hasMany(Visite::class);
    }

    public function registrejournalier()
    {
        return $this->hasMany(RegistreJournalier::class);
    }

    public function parcoursscolaire()
    {
        return $this->hasMany(ParcoursScolaire::class);
    }
}
