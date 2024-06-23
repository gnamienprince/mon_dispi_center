<?php

use App\Http\Controllers\accouchementController;
use App\Http\Controllers\authentificationController;
use App\Http\Controllers\choixServiceController;
use App\Http\Controllers\consultationController;
use App\Http\Controllers\examenController;
use App\Http\Controllers\hospitalisationController;
use App\Http\Controllers\litController;
use App\Http\Controllers\parametreController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\traitementController;
use App\Http\Controllers\userController;
use App\Http\Controllers\validerServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {


    Route::get('home', [authentificationController::class, 'dashboard'])->name('home');

    //////////////////////////////
/////route du medecin////////
////////////////////////////
    Route::post('creationMedecin', [userController::class, 'creationMedecin']);
    //liste des medecins
    Route::get('listeMedecin', [userController::class, 'listeMedecin']);
    //modifier les informations d'un medecin (lui remettre l'id)
    Route::get('pageModifierMedecin', [userController::class, 'pageModifierMedecin']);
    //mettre à jour les informations du medecin
    Route::put('modifierMedecin', [userController::class, 'modifierMedecin']);

    /////////////////////////
//route du technicien///
///////////////////////
    Route::post('creationTechnicien', [userController::class, 'creationTechnicien']);
    //liste des techniciens
    Route::get('listeTechnicien', [userController::class, 'listeTechnicien']);
    //modifier les informations d'un technicien (lui remettre l'id)
    Route::get('pageModifierTechnicien', [userController::class, 'pageModifierTechnicien']);
    //mettre à jour les informations du medecin
    Route::put('modifierTechnicien', [userController::class, 'modifierTechnicien']);

    /////////////////////////
//route des patients////
///////////////////////

    //page de creation du compte patient
    Route::get('pageCreationComptePatient', [patientController::class, 'pageCreationComptePatient'])->name('pageCreationComptePatient');

    //créer un patient
    Route::post('createDossierPatient', [patientController::class, 'createDossierPatient'])->name('createDossierPatient');
    //voir la liste des patients
    Route::get('listePatient', [patientController::class, 'listePatient'])->name('listePatient');
    //page information patient lui remettre aussi l'id
    Route::get('informationPatient{id}', [patientController::class, 'informationPatient']);

    ///////////////////////////////
/////////consultation/////////
/////////////////////////////
//page de creation de consultation
    Route::get('pageCreationConsultation{idPatient}', [consultationController::class, 'pageConsulation'])->name('pageCreationConsultation');
    Route::post('creationConsultation', [consultationController::class, 'creationConsultation'])->name('creationConsultation');

    //liste des consultations
    Route::get('listeConsultation', [consultationController::class, 'listeConsultation']);
    //page mettre a jour une consultation
    Route::get('pageConsulation', [consultationController::class, 'pageConsulation'])->name('majConsulation');
    //page modifier les informations (lui remettre l'id)
    Route::get('pageModifierConsulation{idConsultation}', [consultationController::class, 'pageModifierConsulation']);
    //nombre de consultation par jour  nombreConsultation
    Route::get('nombreConsultation', [consultationController::class, 'nombreConsultation']);
    //mettre a jour une consultation
    Route::put('modifierConsulation{idConsultation}', [consultationController::class, 'modifierConsulation']);
    //rechercher une consultation par la reference
    Route::get('rechercherConsultation{idConsultation}', [consultationController::class, 'rechercherConsultation']);
    //la liste des prochains RDV fixer par le medecin
    Route::get('prochainRDV', [consultationController::class, 'prochainRDV']);
    //page modification de la date d'un RDV
    Route::get('pageModificationDateRDV{ }', [consultationController::class, 'pageModificationDateRDV']);
    //validation de la modification de la date du RDV
    Route::get('modifierDateRDV{ }', [consultationController::class, 'modifierDateRDV']);



    ///////////////////////////
////////traitement////////
/////////////////////////
//creation d'un traitement
    Route::post('creationTraitement', [traitementController::class, 'creationTraitement']);
    //voir la liste des traitements
    Route::get('listeTraitement', [traitementController::class, 'listeTraitement']);
    //page modification de traitement
    Route::post('pageModifierTraitement', [traitementController::class, 'pageModifierTraitement']);
    //modifier un traitement
    Route::post('modifierTraitement', [traitementController::class, 'modifierTraitement']);

    ///////////////////////////
/////hospitalisation//////
/////////////////////////
//créer l'hospitalisation
    Route::post('creationHospitalisation', [hospitalisationController::class, 'creationHospitalisation']);
    //liste des hospitalisés
    Route::get('listeHospitalisation', [hospitalisationController::class, 'listeHospitalisation']);
    //page pour la creation de l'hospitalisation
    Route::get('pageCreationHospitalisation', [hospitalisationController::class, 'pageCreationHospitalisation'])->name('pageCreationHospitalisation');

    // disponibilité des chambres, je ne vois pas l'utilité pour l'instant
// mais je garde le code en commentaire, on ne sais jamais, lol
/////////////////////
///////chambre//////
///////////////////
//liste des chambres disponiblent
//Route::get('chambreDisponible', [chambreController::class, 'chambreDisponible']);
//liste des chambres qui sont occupées
//Route::get('chambreIndisponible', [chambreController::class, 'chambreIndisponible']);

    /////////////////////
///////lit//////////
///////////////////
//liste des lits disponiblent
    Route::get('listsDisponible', [litController::class, 'litsDisponible']);
    //liste des lits qui sont occupées
    Route::get('litsIndisponible', [litController::class, 'litsOccupes']);

    //nombre de chambre disponible
    Route::get('nombreLitDisponible', [litController::class, 'nombreLitDisponible']);

    ///////////////////////////////
//////////accouchement////////
/////////////////////////////
//page accouchement
    Route::get('pageCreationAccouchement{id_consultation}', [accouchementController::class, 'pageCreationAccouchement']);
    //créer un accouchement
    Route::post('creationAccouchement', [accouchementController::class, 'creationAccouchement']);
    //liste des accouchements
    Route::get('listeAccouchement', [accouchementController::class, 'listeAccouchement']);







    //les consultations en attente (leur statut est egal à 0) consultationAttente
    Route::get('consultationAttente', [consultationController::class, 'consultationAttente'])->name('consultationAttente');
    //la page consultation secondaire
    Route::get('consultationSecondaire{idConsultation}', [consultationController::class, 'consultationSecondaire'])->name('consultationSecondaire');
    //mise a jour de la consultation
    Route::post('majConsultation', [consultationController::class, 'majConsultation'])->name('majConsultation');

    ////////////////////////////
//choix du services////////
//////////////////////////
    Route::get('choixService', [choixServiceController::class, 'choixService']);

    //valider les choix du service
    Route::get('validerHospitalisation', [validerServiceController::class, 'validerHospitalisation'])->name('validerHospitalisation');
    Route::get('validerTraitement', [validerServiceController::class, 'validerTraitement'])->name('validerTraitement');
    Route::get('validerExamen', [validerServiceController::class, 'validerExamen'])->name('validerExamen');

    //accouchement
    Route::get('validerAccouchement/{idConsultation}', [validerServiceController::class, 'validerAccouchement'])->name('validerAccouchement');


    //avoir des informations sur les patients
    Route::get('informationTotalPatient{idPatient}', [patientController::class, 'informationTotalPatient'])->name('informationTotalPatient');

    // la page pour voir les examens qui sont en attente
    Route::get('pageExamenAttente', [examenController::class, 'pageExamenAttente'])->name('pageExamenAttente');

    //enregistrer les resultats d'un examen
    Route::get('enregistrerExamen', [examenController::class, 'enregistrerExamen'])->name('enregistrerExamen');


    //la partie accouchement
    Route::get('pageAccouchement', [accouchementController::class, 'pageAccouchement'])->name('pageAccouchement');

    Route::get('majAccouchement', [accouchementController::class, 'majAccouchement'])->name('majAccouchement');


    //acceder dans les paramètres
    Route::get('parametre', [parametreController::class, 'pageParametre'])->name('parametre');


    Route::post('modifierMDP', [parametreController::class, 'modifierMDP'])->name('modifierMDP');



});
