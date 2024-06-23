<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use DB;
use Auth;

class consultationController extends Controller
{
    //page de mise a jour d'une consultation
    public function pageConsulation($idPatient)
    {
        //recuperation de l'id du patient;
        $client = DB::table('dossier_patients')->where('id', $idPatient)->first();
        $idPatient = $client->id;
        $nom = $client->nom;
        $prenom = $client->prenom;


        //retourner sur la page avec ces deux informations
        //info c'est le message à envoyé apres la creation de la consultation
        $info = 0;
        return view('pages.consultation', [
            'idPatient' => $idPatient,
            'nom' => $nom,
            'prenom' => $prenom,
            'info' => $info
        ]);
    }

    //page consultation secondaire du medecin
    //lui donner l'id de la consultation
    public function consultationSecondaire($idConsultation)
    {
        //recuperation de l'id du patient;
        $listeConsultation = DB::table('consultations')->where('consultations.id', $idConsultation)
            ->join('dossier_patients', 'consultations.dossier_patient_id', '=', 'dossier_patients.id')
            ->select('consultations.id', 'dossier_patients.nom', 'dossier_patients.prenom', 'consultations.constante')
            ->get()
            ->first();
        //dd($listeConsultation);

        //$idPatient = $client->id;
        //$nom = $client->nom;
        //$prenom = $client->prenom;


        //retourner sur la page avec ces deux informations
        //info c'est le message à envoyé apres la creation de la consultation
        $info = 0;
        return view('pages.consultationSecondaire', [
            'listeConsultationAttente' => $listeConsultation
        ]);
    }
    //page de creation de consultation

    //création d'une consultation
    public function creationConsultation(Request $request)
    {
        //tension
        //temperature
        //taille
        $constante = [
            'tension' => $request->tension,
            'temperature' => $request->temperature,
            'taille' => $request->taille
        ];
        $constante = json_encode($constante);

        $consultation = new Consultation;
        $consultation->constante = $constante;
        $consultation->diagnostique = null;
        $consultation->pathologie = null;
        $consultation->prescription = null;
        $consultation->dateRDV = null;
        $consultation->statutConsultation = 0;
        $consultation->medecin_id = 1;
        $consultation->dossier_patient_id = $request->idPatient;
        $consultation->save();

        //$info = "la consultation à bien été ajoutée";

        $listepatient = new patientController();
        
        $info = "la consultation à bien été ajoutée, ";
        return ($listepatient->listeDesPatients($info));
        //return view('pages.listePatient', [
        //  'listepatient' => $listepatient,
        //'info' => $info
        //]);
    }

    //mise a jour de la consultation par le medecin
    public function majConsultation(Request $request)
    {
        //une validate 

        $request->validate([
            'diagnostique' => 'required|string',
            'pathologie' => 'required|string',
            'prescription' => 'required|String',
            'rdv' => 'date',
        ]);

        //recuperation de l'id du medecin pour la mise a jour de la consultation
        $idMedecin = Auth::user()->id;
        //recuperation du vrai id du medecin dans la table medecin
        $idMedecin = DB::table('medecins')->where('user_id', $idMedecin)->value('id');
        //dd($idMedecin);

        //$majConsultation = new Consultation;
        $idConsultation = $request->idConsultation;
        $diagnostique = $request->diagnostique;
        $pathologie = $request->pathologie;
        $prescription = $request->prescription;
        $rdv = $request->rdv;

        DB::table('consultations')
            ->where('id', $idConsultation)
            ->update([
                'diagnostique' => $diagnostique,
                'pathologie' => $pathologie,
                'prescription' => $prescription,
                'dateRDV' => $rdv,
                'statutConsultation' => 1,   //1 pour dire que la consultation est belle et bien terminée
                'medecin_id' => $idMedecin
            ]);

        //si l'inscription est ok , renvoie sur la page du choix du service
        $info = "l'Enregistrement de la consultation à bien été effectué";

        //information traitement
        $choixService = new choixServiceController();
        return $choixService->choixService($info, $idConsultation);
    }

    public function nombreConsultation()
    {
        // Obtenir la date d'aujourd'hui
        $dateAujourdhui = date('Y-m-d');

        // Compter le nombre de consultations pour aujourd'hui
        $nombreConsultationAujourdhui = DB::table('consultations')
            ->whereDate('created_at', $dateAujourdhui)
            ->count();

        return $nombreConsultationAujourdhui;
    }

    //rdv des consultations
    public function rdvConsultation()
    {
        // Obtenir la date d'aujourd'hui
        $dateAujourdhui = date('Y-m-d');

        // Compter le nombre de consultations pour aujourd'hui
        $nombreRDVAujourdhui = DB::table('consultations')
            ->whereDate('dateRDV', $dateAujourdhui)
            ->count();

        return $nombreRDVAujourdhui;
    }

    //liste des consultations
    public function listeConsultation()
    {
        //liste
        $listeConsultation = DB::table('consultations')
            ->join('dossier_patients', 'consultations.dossier_patient_id', '=', 'dossier_patients.id')
            ->select('consultations.created_at', 'consultations.statutConsultation', 'dossier_patients.nom', 'dossier_patients.prenom', 'dossier_patients.telephone', 'consultations.constante')
            ->get();

        return $listeConsultation;
    }

    //les consultations en attente consultationAttente
    public function consultationAttente()
    {
        //liste
        $listeConsultation = DB::table('consultations')
            ->where('consultations.statutConsultation', '=', 0)
            ->join('dossier_patients', 'consultations.dossier_patient_id', '=', 'dossier_patients.id')
            ->select('consultations.id', 'consultations.dossier_patient_id', 'consultations.created_at', 'dossier_patients.nom', 'dossier_patients.prenom', 'dossier_patients.telephone', 'consultations.constante')
            ->get();
        //dd($listeConsultation);
        //return $listeConsultation;
        return view('pages.consultationAttente', [
            'listeConsultation' => $listeConsultation
        ]);
    }


    //page modifier une consultation (lui remettre l'id de la consultation)
    public function pageModifierConsulation($idConsultation)
    {
        //recuperation donnée consultation
        $donneeConsultation = Consultation::where('id', $idConsultation)->get();
        return $donneeConsultation;
        //recuperation donnée medecin


        //faire passer $donneeConsulation a la vue maintenant
        //return ;//la page en question
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }
    //modifier une consultation
    public function modifierConsulation($id, Request $request)
    {

        $modification = Consultation::find($id);
        $modification->constante = $request->constante;
        $modification->diagnostique = $request->diagnostique;
        $modification->pathologie = $request->pathologie;
        $modification->prescription = $request->prescription;
        $modification->dateRDV = $request->dateRDV;
        $modification->medecin_id = $request->medecin_id;
        $modification->save();

        return "ok";
        // si c'est bon
    }

    //rechercher une consultation dans la base de donnée a travers l'id
    //lui remettre aussi l'id rechercher
    public function rechercherConsultation($idConsultation)
    {
        $consultation = Consultation::find($idConsultation);
        return $consultation;
    }

    //voir la liste des prochains rendez-vous fixer par le medecin
    // date du rdv, nom du patient, nom du medecin
    public function prochainRDV()
    {
        return;
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }

    //page modification du RDV
    public function pageModificationDateRDV($idConsultation)
    {
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }

    //possiblité de modifier la date du RDV
    // voir aussi avec le nom des differents patients et les medecins qui ont fixé le RDV
    public function modifierDateRDV($idConsultation)
    {
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }
}
