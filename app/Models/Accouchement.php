<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accouchement extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'description'
    ];
}
