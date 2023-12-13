<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    protected $table = 'visite';

    protected $fillable = [
        'date',
        'rapport',
        'id_tuteur',
        'id_benef'
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benef');
    }

    public function tuteur()
    {
        return $this->belongsTo(Tuteur::class, 'id_tuteur');
    }
}
