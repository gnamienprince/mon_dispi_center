<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lit extends Model
{
    //statut   1 pour occupé et 0 pour non occupé
    use HasFactory;
    protected $fillable = [
        'description',
        'statut'
    ];
}
