<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActMedical;
use Illuminate\Http\Request;

class actMedicalController extends Controller
{
    //creation d'un act medical
    //la reference est 0, on a pas besoin de ça dans le front pour l'instant
    public function createAct(Request $request)
    {
        $act = new ActMedical;
        $act->libelleAct = $request->libelleAct;
        $act->save();
    }
}
