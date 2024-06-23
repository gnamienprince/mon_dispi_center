<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class choixServiceController extends Controller
{
    //page du choix du service
    public function choixService($info,$idConsultation){

        $actMedical = DB::table('act_medicals')->get();
        //chambre
        $chambre = DB::table('chambres')
            ->join('lits', 'lits.chambre_id', '=', 'chambres.id')
            ->where('lits.statut', '=', 0)
            ->select('lits.chambre_id', 'lits.id')
            ->get();

        //dd($chambre);

        //la liste des examens
        $examen = DB::table('examens')->get();

        //dd($examen);

        return view('pages.choixService', [
            'info' => $info,
            'idConsultation' => $idConsultation,
            'actMedical' => $actMedical,
            'chambre' => $chambre,
            'examen' => $examen
        ]);

        //return view('pages.choixService');
    }
}
