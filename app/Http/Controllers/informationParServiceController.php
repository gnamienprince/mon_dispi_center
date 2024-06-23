<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class informationParServiceController extends Controller
{
    //on appel la fontion en lui donnant l'id de la consultation et aussi la table du service
    public function informationParService($idConsultation,$service){
        //recuperation  des informations sur le traitement
        $traitements = collect(); // Créer une collection vide pour accumuler les résultats

        foreach ($idConsultation as $id) {
            $results = DB::table($service)
                ->where('consultation_id', $id)
                ->join('consultations','consultations.id','=',$service.'.consultation_id')
                ->join('medecins','medecins.id','=','consultations.medecin_id')
                ->join('users','users.id','=','medecins.id')
                ->get();

            $traitements = $traitements->merge($results); // Fusionner les résultats dans la collection
        };
        //dd($traitements);
        return $traitements;
    }
}
