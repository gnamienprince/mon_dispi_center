<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DossierPatient;
use App\Models\Traitement;
use Illuminate\Http\Request;
use DB;

class patientController extends Controller
{

    public function pageCreationComptePatient()
    {
        $message = 0;
        return view('pages.creerPatient',[
            'message' => $message
        ]);
    }
    //création du compte patient

    public function createDossierPatient(Request $request)
    {

        // Valider les données
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'dateNaissance' => 'required|date',
            'lieuNaissance' => 'required|string',
            'localisation' => 'required|string',
            'telephone' => 'required|min:10',
            'email' => 'required|email',
            'profession' => 'required|string',
            'antecedent' => 'required|string',
        ]);

        $patient = new DossierPatient;
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->dateNaissance = $request->dateNaissance;
        $patient->lieuNaissance = $request->lieuNaissance;
        $patient->localisation = $request->localisation;
        $patient->telephone = $request->telephone;
        $patient->email = $request->email;
        $patient->profession = $request->profession;
        $patient->antecedent = $request->antecedent;
        //dd($request -> nom);
        $patient->save();
        $message = 'Le compte du patient à bien été crée';
        return view('pages.creerPatient',[
            'message' => $message
        ]);
    }

    //liste des dossiers patients
    public function listePatient()
    {
        $listePatient = DB::table('dossier_patients')->get();
        //return $listePatient;

        //les informations de creation de consultation
        $info = 0;
        return view('pages.listePatient',[
            'listePatient' => $listePatient,
            'info' => $info
        ]);
    }

    //dans cette fonction, on retourne avec le message qui nous dit que le compte a bien été crée
    public function listeDesPatients($info)
    {
        $listePatient = DB::table('dossier_patients')->get();
        

        //les informations de creation de consultation
        
        return view('pages.listePatient', [
            'listePatient' => $listePatient,
            'info' => $info
        ]);
    }

    //information dossiers patients
    public function informationPatient($id)
    {
        $information = DB::table('dossier_patients')
            ->where('dossier_patients.id', '=', $id)
            ->select('dossier_patients.id','dossier_patients.nom', 'dossier_patients.prenom', 'dossier_patients.dateNaissance', 'dossier_patients.lieuNaissance', 'dossier_patients.localisation', 'dossier_patients.telephone', 'dossier_patients.email')
            ->first();
        //dd($information);
        return $information;
    }

    

    //avoir des informations total sur le patient
    public function informationTotalPatient(Request $request){
        $idPatient = $request->idPatient;
        //information sur le patient
        $informationPatient = DB::table('dossier_patients')
            ->where('id', $idPatient)
            ->first();
           //dd($informationPatient);
       

        $idConsultation = DB::table('consultations')
            ->where('dossier_patient_id', $idPatient)
            ->pluck('id');
        //dd($idConsultation);
        //recuperation des informations du medecin qui a fais la consultation
        

        //dd($infoMedecin);

        //dd($idConsultation);
        $infoConsultation = DB::table('consultations')
            ->where('dossier_patient_id', $idPatient)
            ->join('users', 'users.id', '=', 'consultations.medecin_id')
            ->select('consultations.created_at', 'consultations.constante', 'consultations.diagnostique', 'consultations.pathologie', 'consultations.prescription','consultations.dateRDV', 'users.nom', 'users.prenom')
            ->get();
            

        //dd($infoConsultation);
        //jai l'id de la consultation
        //je vais faire un foreach la dessus maintenant

        //partie traitement 
        $service = 'traitements';
        $traitements = new informationParServiceController(); 
        $traitements = $traitements->informationParService($idConsultation, $service);

        //dd($traitements);

        //sur l'hospitalisation

        //recuperation  des informations sur le traitement
        //partie traitement 
        $service = 'hospitalisations';
        $hospitalisations = new informationParServiceController();
        $hospitalisations = $hospitalisations->informationParService($idConsultation, $service);

        //dd($hospitalisations);
        
        //apres je dois faire passer aussi l'id du medecin 
        //pour avoir son nom et son prenom
        //dd($hospitalisations);

        //sur l'accouchement
        //partie traitement 
        $service = 'accouchements';
        $accouchements = new informationParServiceController();
        $accouchements = $accouchements->informationParService($idConsultation, $service);
        //dd($accouchements);

        // la liste des infirmiers dans un tableau
        $listeInfirmier = DB::table('techniciens')
            ->join('users','techniciens.user_id','=','techniciens.id')
            ->get();
        //dd($listeInfirmier[0]->nom);
        //sur l'examen
        //partie traitement 
        $service = 'resultat_examens';
        $examens = new informationParServiceController();
        $examens = $examens->informationParService($idConsultation, $service);
        //dd($examens);
        //dd($infoConsultation);

        
        return view('pages.informationCompletePatient', [
            'informationPatient' => $informationPatient,
            'consultation' => $infoConsultation,
            'traitements' => $traitements,
            'accouchements' => $accouchements,
            'hospitalisations' => $hospitalisations,
            'examens' => $examens,
            'listeInfirmier' => $listeInfirmier
        ]);
    }
}
