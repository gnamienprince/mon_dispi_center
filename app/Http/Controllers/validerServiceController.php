<?php

namespace App\Http\Controllers;

use App\Models\Accouchement;
use App\Models\Hospitalisation;
use App\Models\ResultatExamen;
use App\Models\Traitement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;


class validerServiceController extends Controller
{
    public function infoConsultation($id)
    {
        $infoConsultation = DB::table('consultations')
            ->where('id', $id)
            ->first();
        return $infoConsultation;
    }
    //validation de traitement
    public function validerTraitement(Request $request)
    {
   
        //dd($request);
        $objet = $request->objet;
        $observation = $request->observation;
        $act = $request->acte;
        $idConsultation = $request->idConsultation;

        //creation de l'objet traitement pour l'insertion 
        $traitement = new Traitement();
        $traitement->objet = $objet;
        $traitement->observation = $observation;
        $traitement->act_medical_id = $act;
        $traitement->consultation_id = $idConsultation;
        $traitement->save();

        //$pageListeConsultation = new consultationController();
        //return $pageListeConsultation->consultationAttente();

        //on ne va plus retourner sur le page des services mais on va plutot affiche le ficiher pdf
        //donc on recupère toutes les données de la consultation dans un json qu'on va transmetre au fichier pdf

        $infoConsultion = $this->infoConsultation($idConsultation);
        $infoPatient = new patientController();

        //ici on recupere les informations du patient provenant depuis le controller patientController
        $infoPatient = $infoPatient->informationPatient($infoConsultion -> dossier_patient_id);

        $pagePDF = new generationPdfController();
        return $pagePDF->pdfTraitement($traitement,$infoConsultion,$infoPatient);
    }

    //validation de hospitalisation
    public function validerHospitalisation(Request $request)
    {

        //dd($request);
        //dans ce conexte $request -> chambre represente le numero du lit
        $lit = $request->chambre;
        $jour = $request->jour;
        $idConsultation = $request->idConsultation;
        //dd($idConsultation);
        //dd($lit);
        DB::table('lits')->where('id', $lit)
            ->update([
                'statut' => 1
            ]);


        //enregistrement des données dans la table hospitalisation
        $hospitalisation = new Hospitalisation();
        $hospitalisation->dateDebut = Carbon::today();
        //dd($hospitalisation->dateDebut);

        $hospitalisation->dateFin = now()->addDays($jour);
        $hospitalisation->lit_id = $lit;
        $hospitalisation->consultation_id = $idConsultation;
        $hospitalisation->save();

        //information de la consultation et du patient
        $infoConsultion = $this->infoConsultation($idConsultation);
        $infoPatient = new patientController();

        //ici on recupere les informations du patient provenant depuis le controller patientController
        $infoPatient = $infoPatient->informationPatient($infoConsultion->dossier_patient_id);
        //on retourne le fichier PDF
        $pagePDF = new generationPdfController();
        return $pagePDF->pdfHospitalisation($hospitalisation, $infoConsultion, $infoPatient);


        //$pageListeConsultation = new consultationController();
        //return $pageListeConsultation->consultationAttente();

    }


    public function validerAccouchement(Request $request)
    {
        $idConsultation = $request->idConsultation;
        $info = "L'accouchement a bien été créé. Un technicien prendra le relais";

        //création de la ligne accouchement dans la base de donnée
        $accouchement = new Accouchement();
        $accouchement->consultation_id = $idConsultation;
        $accouchement->dateAccouchement = now();
        $accouchement->description = '.';
        $accouchement->technicien_id = 1;
        $accouchement->save();
        //1 qui est l'id du technicien par defaut

        //si l'enregistrement est ok , renvoie sur la page du choix du service

        $choixService = new choixServiceController();
        return $choixService->choixService($info, $idConsultation);

    }

    public function validerExamen(Request $request)
    {
        //la partie examen ouffff
        //id de examen
        $examensCoches = $request->input('examens');
        $idConsultation = $request->idConsultation;
        //dd($examensCoches);


        //creation de la table resultat examens
        foreach ($examensCoches as $idExamen) {
            $resultatExamen = new ResultatExamen();
            $resultatExamen->objet = '.';
            $resultatExamen->interpretation = '.';
            $resultatExamen->dateExamen = now();
            $resultatExamen->consultation_id = $idConsultation;
            $resultatExamen->examen_id = $idExamen;
            $resultatExamen->save();
        }
        $info = 'Examen bien enregistré';


        //ok maintenant ici on va imprimer le fichier PDF
        //information de la consultation et du patient
        $infoConsultion = $this->infoConsultation($idConsultation);
        $infoPatient = new patientController();

        //ici on recupere les informations du patient provenant depuis le controller patientController
        $infoPatient = $infoPatient->informationPatient($infoConsultion->dossier_patient_id);
        $pagePDF = new generationPdfController();
        return $pagePDF->pdfExamen($resultatExamen,$examensCoches, $infoConsultion, $infoPatient);
        //si l'enregistrement est ok , renvoie sur la page du choix du service

        //$choixService = new choixServiceController();
        //return $choixService->choixService($info, $idConsultation);

    }
}
