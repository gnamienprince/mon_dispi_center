<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use DB;

class generationPdfController extends Controller
{
    //pdf de traitement avec la consultation

    //recuperation
    public function pdfTraitement($traitement, $infoConsultion,$infoPatient)
    {
        //dd($infoPatient);
        //dd($infoConsultion);
        //dd($traitement);

        //recuperation des informations de traitement
        $infoTraitement = new traitementController();
        $infoTraitement = $infoTraitement->infoTraitement($traitement ->act_medical_id);
        //dd($infoTraitement);

        //recuperation des informations du medecin qui effectue la consultation
        $infoMedecin = new userController();
        $infoMedecin = $infoMedecin->infoMedecin();

        //dd($infoMedecin);

        return Pdf::loadView("pdf.traitement",[
            "traitement" => $traitement,
            "infoPatient" => $infoPatient,
            "infoConsultation" => $infoConsultion,
            "infoTraitement" => $infoTraitement,
            "infoMedecin" => $infoMedecin
        ])->stream('.pdf');
    }

    public function pdfHospitalisation($hospitalisation, $infoConsultion, $infoPatient)
    {   
        //hospitalisation
        //avec $hospitalisation on va recuperer les données de la chambre
        $idChambre = DB::table('lits')
            ->where('id', $hospitalisation->lit_id)
            ->pluck('chambre_id')
            ->first();

            
        //dd($idChambre);
        //dd($hospitalisation);
        //recuperation des informations du medecin qui effectue la consultation
        $infoMedecin = new userController();
        $infoMedecin = $infoMedecin->infoMedecin();

        return Pdf::loadView("pdf.hospitalisation",[
            "hospitalisation" => $hospitalisation,
            "infoPatient" => $infoPatient,
            "infoConsultation" => $infoConsultion,
            "infoMedecin" => $infoMedecin,
            "idChambre" => $idChambre
        ])->stream('.pdf');
    }

    public function pdfExamen($resultatExamen,$examensCoches, $infoConsultion, $infoPatient)
    {
        // je fais passer resultatExamen pour recuperer la date
        //dd($resultatExamen);
        $i = 0;
        // ici cela consiste a recuperer le nom des examens à realiser
        foreach ($examensCoches as $examen){
            $examen = DB::table('examens')
                ->where('id', $examen)
                ->pluck('libExamen')
                ->first();
            $listeExamen[$i] = $examen;
            $i++;
        }
        //dd($listeExamen);

        
        //dd($examensCoches[0]);
        //recuperation des informations du medecin qui effectue la consultation
        $infoMedecin = new userController();
        $infoMedecin = $infoMedecin->infoMedecin();

        return Pdf::loadView("pdf.examen",[
            'resultatExamen' => $resultatExamen,
            'examens' => $listeExamen,
            "infoPatient" => $infoPatient,
            "infoConsultation" => $infoConsultion,
            "infoMedecin" => $infoMedecin,
        ])->stream('.pdf');
    }

    //je pense qu'on a n'a pas besoin de pdf pour l'accouchement pour l'instant
    public function pdfAccouchement(Request $request)
    {
        
        return Pdf::loadView("pdf.accouchement")->stream('.pdf');
    }
}
