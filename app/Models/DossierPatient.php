<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierPatient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'dateNaissance',
        'lieuNaissance',
        'localisation',
        'telephone',
        'email',
        'profession',
        'antecedent'
    ];
}

