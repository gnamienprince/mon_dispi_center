<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatExamen extends Model
{
    use HasFactory;
    protected $fillable = [
        'objet',
        'interpretation',
        'dateExamen'
    ];
}
