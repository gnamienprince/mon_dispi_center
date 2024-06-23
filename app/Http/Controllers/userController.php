<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Medecin;
use App\Models\Technicien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller

{

    //recuperation des informations de la personnes qui est connecté
    //medecin, technicien etc...

    public function infoMedecin(){
        $user = Auth::user();
       

        $infoMedecin = [
            "id" => $user -> id,
            "nom" => $user->nom,
            "prenom" => $user->prenom
        ];

        return $infoMedecin;
    }
    //création de compte medecin
    function creationMedecin(Request $request)
    {
        $user = new User;
        $user->nom = $request -> nom;
        $user->prenom = $request -> prenom;
        $user->telephone = $request -> telephone;
        $user->email = $request -> email;
        $user->cni = $request ->cni;
        $user->compteBanque = $request ->compteBanque;
        $user->password = $request -> password;
        $user->save();

        $idMedecin = $user->id;
        $medecin = new Medecin;
        $medecin->id = $idMedecin;
        $medecin->grade = $request->grade;
        $medecin->specialite = $request->specialite;
        $medecin->user_id = $user->id;
        $medecin->save();
    }

    //création de compte technicien
    function creationTechnicien(Request $request)
    {
        $user = new User;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->cni = $request->cni;
        $user->compteBanque = $request->compteBanque;
        $user->password = $request->password;
        $user->save();

        $idTechnicien = $user->id;
        $technicien = new Technicien;
        $technicien->id = $idTechnicien;
        $technicien->grade = $request->grade;
        $technicien->specialite = $request->specialite;
        $technicien->user_id = $user->id;
        $technicien->save();
    }


    /////////////////////////////////////////
    ///////les pas utils pour l'instant//////
    ////////////////////////////////////////

    

    //liste des medecins
    function pageModifierMedecinlisteMedecin()
    {
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }


    //page modification d'un medecin
    public function pageModifierMedecin(){
        return "teest"; //retourner les informations du medecin pour l'affichage
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }

    //modifier maintenant un medecin
    public function modifierMedecin(Request $request){
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }

    //liste des techniciens
    function listeTechnicien()
    {
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }

    //page modification d'un technicien
    public function pageModifierTechnicien()
    {
        return; //retourner les informations du medecin pour l'affichage
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }

    //modifier maintenant un technicien
    public function modifierTechnicien(Request $request)
    {
        ///////////////////////
        ///////a faire////////
        /////////////////////
    }
}
