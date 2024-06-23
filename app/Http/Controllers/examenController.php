<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use DB;
class examenController extends Controller
{
    // la page pour voir les examen qui sont en attente
    // le patient doit se rendre la bas pour effectuer l'examen
    public function pageExamenAttente(){
        $examen = DB::table('resultat_examens')
            ->where('statut', '=', 0)
            ->join('examens', 'examens.id', '=', 'resultat_examens.examen_id')
            ->join('consultations', 'consultations.id', '=', 'resultat_examens.consultation_id')

            ->join('dossier_patients', 'dossier_patients.id', '=', 'consultations.dossier_patient_id')
            ->select('resultat_examens.id as resultat_examens_id','resultat_examens.*','examens.libExamen','consultations.*','dossier_patients.*')
            ->get();
        //dd($examen);
       

        //on donne $listeExamen maintenant à la vue

     
        //return $examen
        //j'envoie les données la vue maintenant pour l'affichage
        return view('pages.examenAttente', [
            'examen' => $examen
        ]);
    }


    //enregistrement du resultat de dl'examen
    public function enregistrerExamen(Request $request){
        $idResultatExamen = $request->idConsultation;
        //dd($idConsultation);
        $objet = $request->objet;
        $interpretation = $request->interpretation;
        $dateExamen = $request->dateExamen;
        

        //dd($idResultatExamen);

        //faire la mise a jour des données maintenant
        DB::table('resultat_examens')
            ->where('id', $idResultatExamen)
            ->update(
                [
                    'statut' => 1, // 1 pour dire que l'examen a bien été effectué et que le resultat est prêt
                    'objet' => $objet,
                    'interpretation' => $interpretation,
                    'dateExamen' => $dateExamen
                ]
            );
        //dd('ok');
        //on affiche un pdf pour les resultats
        //consultation
        $infoResultat = DB::table('resultat_examens')
            ->where('resultat_examens.id', $idResultatExamen)
            ->join('consultations', 'consultations.id', '=', 'resultat_examens.consultation_id')
            ->join('dossier_patients', 'dossier_patients.id', '=', 'consultations.dossier_patient_id')
            ->join('examens', 'examens.id', '=', 'resultat_examens.examen_id')

            ->select('resultat_examens.*', 'consultations.*', 'dossier_patients.*', 'examens.*')
            ->first();
        //dd($infoResultat);
        //affiche le fichier des resultats
        return Pdf::loadView("pdf.resultatExamen", [
            "infoResultat" => $infoResultat
        ])->stream('.pdf');
        //on le retourne maintenant sur la liste des examens en attente
        //$pageExamenAttente = new examenController();
        //return $pageExamenAttente->pageExamenAttente();
    }

    //la page pour afficher la liste des accouchements et mettre a jour les informations

   
}
