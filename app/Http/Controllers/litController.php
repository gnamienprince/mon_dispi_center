<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lit;
use Illuminate\Http\Request;

class litController extends Controller
{
    //liste des lits disponibles
    public function litsDisponible(){
        $litDisponible = Lit::where('statut',0)->get();
        return $litDisponible;
    }

    //lists occupés
    public function litsOccupes(){
        $litDisponible = Lit::where('statut', 1)->get();
        return $litDisponible;
    }

    //le nombre de chambre disponible
    public function nombreLitDisponible(){
        $litsDisponibles = Lit::where('statut', 0)->count();
        return $litsDisponibles;
    }
}
