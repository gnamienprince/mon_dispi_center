<?php

namespace App\Http\Controllers;

use App\Models\ResultatExamen;
use Illuminate\Http\Request;

class ResultatExamenController extends Controller
{
    //créer le resultat d'un examen qui es rataché a la consulatation
    public function creationResultatExamen(Request $request){

        //sans oubllier la recuperation de l'id consultation et de l'examen
        $resultat = new ResultatExamen;
        $resultat->objet = $request->objet;
        $resultat->interpretation = $request->interpretation;
        $resultat->dateExamen = $request->dateExamen;
        $resultat->consultation_id = $request->consultation_id;
        $resultat->examen_id = $request->examen_id;

        $resultat->save();
    }
}
