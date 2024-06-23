<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Traitement;
use Illuminate\Http\Request;
use DB;

class traitementController extends Controller
{
    //creation d'un traitement
    public function creationTraitement(Request $request){

        //dd('test');
        $traitement = new Traitement;
        $traitement->objet = $request->objet;
        $traitement->observation = $request->observation;
        $traitement->act_medical_id = $request->act_medical_id;
        $traitement->consultation_id = $request->consultation_id;
        $traitement->save();

        
    }

    public function infoTraitement($id){
        $infoTraitement = DB::table('act_medicals')
            ->where('id', $id)
            ->first();
        return $infoTraitement;
    }

    //liste des traitements
    public function listeTraitement(){
        //les traitements serons afficher par liste,
        //id traitement , nom patient , le medecin traitant, l'observation
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }
}
