<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hospitalisation;
use App\Models\Lit;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class hospitalisationController extends Controller
{
    //pas besoin de page hospitalisation
    public function pageCreationHospitalisation()
    {
        //en creant l'hospitalisation, lui remettre l'id des chambres disponible
        //requette pour recuperer l'id des chambres dispo et faire passer cela a la vue
        $listeHospitalisation = DB::table('hospitalisations')
            ->join('consultations', 'hospitalisations.consultation_id', '=', 'consultations.id')
            ->join('dossier_patients', 'consultations.dossier_patient_id', '=', 'dossier_patients.id')
            ->join('lits', 'hospitalisations.lit_id', '=', 'lits.id')
            ->select('hospitalisations.dateDebut','hospitalisations.dateFin', 'dossier_patients.nom', 'dossier_patients.prenom', 'dossier_patients.telephone', 'lits.id', 'lits.chambre_id')
            ->get();

        //ici je prend la date d'aujourdhui pour faire varier les statuts
        $dateToday = Carbon::today();

        //dd($listeHospitalisation);
        return view('pages.hospitalisation', [
            'listeHospitalisation' => $listeHospitalisation,
            'dateToday' => $dateToday
        ]);
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }
    //creation d'une ligne hospitalisation
    //en hospitalisant, on atribut un lit au patient en même temps
    public function creationHospitalisation(Request $request)
    {
        //dd('testtestts');
        //quand le lit est occupé,le statut du lit est à 1, dans le cas contraire le statut est à 0
        //recuperation de l'id du lit pour le faire passer a 1
        $lit_id = $request->lit_id;
        //recuperation du lit attribué au patient
        $hospitalisation = new Hospitalisation;
        $hospitalisation->dateDebut = $request->dateDebut;
        $hospitalisation->dateFin = $request->dateFin;
        $hospitalisation->lit_id = $lit_id;
        $hospitalisation->consultation_id->$request->consultation_id;
        $hospitalisation->save();

        //une fois l'hospitalisation créer, on change le statut du lit
        Lit::where('id', $lit_id)->update(['statut', 1]);

    }

    //liste des personnes hospitalisées
    public function listeHospitalisation()
    {
        ///////////////////////
        ///////a faire////////
        /////////////////////


    }
}
