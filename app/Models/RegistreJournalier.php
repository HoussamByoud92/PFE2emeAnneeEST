<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistreJournalier extends Model
{
    use HasFactory;

    protected $table = 'registrejournalier';

    protected $fillable = [
        'abscence',
        'periode_abs',
        'justife',
        'activite',
        'type_act',
        'heure_act',
        'incident',
        'type_incid',
        'description_incid',
        'id_benef'
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benef');
    }
}
