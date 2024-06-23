<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\DossierPatient;
use Auth;
use App\Http\Controllers\litController;

class authentificationController extends Controller
{
    public function authentification()
    {
        dd('test');
        $nombreLitDispo = new litController;
        $nombreLitsDisponibles = $nombreLitDispo->nombreLitDisponible();

        $consultation = new consultationController;
        $consultation = $consultation->listeConsultation();

        // Authentification échouée, redirection avec un message d'erreur
        return to_route('login')->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.'
        ]);

      
    }

    public function deconnexion(){
        Auth::logout();
        return view('welcome');
    }

    public function dashboard(){
        
        //des données à fais passer a la vue
        //le nombre des consulations a faire today
        //le nombre de rendez-vous
        //le nombre de chambre disponible
        $nombreLitDispo = new litController;
        $nombreLitsDisponibles = $nombreLitDispo->nombreLitDisponible();

        $consultation = new consultationController;
        $listeconsultation = $consultation->listeConsultation();
        
        //rdv consultation rdvConsultation
        $rdvConsultation = $consultation->rdvConsultation();

        $nombreConsultation = $consultation->nombreConsultation();
        return view('pages.dashboard',[
            'nombreLitsDisponibles' => $nombreLitsDisponibles,
            'listeconsultation' => $listeconsultation,
            'nombreConsultation' => $nombreConsultation,
            'rdvConsultation' => $rdvConsultation
        ]);
    }
}
