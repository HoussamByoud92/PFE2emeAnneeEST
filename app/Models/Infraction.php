<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraction extends Model
{
    use HasFactory;

    protected $table = 'infraction';

    protected $fillable = [
        'date',
        'type',
        'decision',
        'id_benef'
    ];

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, 'id_benef');
    }
}
