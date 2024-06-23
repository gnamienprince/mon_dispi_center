<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accouchement;
use App\Models\Technicien;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class accouchementController extends Controller
{

    public function pageAccouchement()
    {
        $accouchement = DB::table('accouchements')
            ->where('statut', 0)
            ->join('consultations', 'consultations.id', 'accouchements.consultation_id')
            ->join('dossier_patients', 'dossier_patients.id', 'consultations.dossier_patient_id')
            ->select('accouchements.*', 'consultations.*', 'dossier_patients.*')
            ->get();
        //d($accouchement);
        return view('pages.listeAccouchement', [
            'accouchement' => $accouchement
        ]);
    }

    //mettre a jour l'accouchement
    public function majAccouchement(request $request){

        $request->validate([
            'idConsultation' => 'required',
            'date' => 'required',
        ]);

        $idAccouchement = $request->idConsultation;
        $date = $request->date;
        $description = $request->description;
        $idUser = Auth::user()->id;
        $idTechnicien = DB::table('techniciens')
            ->where('user_id', $idUser)
            ->pluck('id')
            ->first();
        //dd($idTechnicien);
        //on va mettre a jour maintenant la table accouchement
        DB::table('accouchements')
            ->where('id', $idAccouchement)
            ->update([
                'statut' => 1,
                'dateAccouchement' => $date,
                'description' => $description,
                'technicien_id' => $idTechnicien
            ]);

        return $this->pageAccouchement();
    }
    public function pageCreationAccouchement($id_consultation){
        //une requette pour recuperer tout les techniciens de la base de données
        //ensuite retourner a la vue, la liste des technicien, l'id aussi de la consultation

        //non plutot tout juste le nom et le prenom des techniciens
        $listeTechnicien = DB::table('users')
            ->join('techniciens', 'techniciens.user_id', '=', 'users.id')
            ->select('users.nom','users.prenom')->get();
        
        return $listeTechnicien;
        
    }
    //creation d'un accouchement
    public function creationAccouchement(request $request){
        //pour l'accouchement, recupration du technicien, de la consultation pour remplir cette table
        $accouchement = new Accouchement;
        $accouchement->dateAccouchement = $request->dateAccouchement;
        $accouchement->description = $request->description;
        $accouchement->technicien_id = $request->technicien_id;
        $accouchement->consultation_id = $request->consultation_id;
        $accouchement->save();
    }

    //liste des accouchements
    public function listeAccouchement(){
        $listeAccouchement = DB::table('accouchements')
            ->join('consultations', 'accouchements.id', '=', 'consultations.id')
            ->join('dossier_patients', 'accouchements.id', '=', 'dossier_patients.id')
            ->join('techniciens','accouchements.id', '=', 'techniciens.id' )
            //->join('users','techniciens.id','=','users.id')
            ->select('accouchements.dateAccouchement', 'dossier_patients.nom','dossier_patients.prenom')->get();

        return $listeAccouchement;

    }
}
