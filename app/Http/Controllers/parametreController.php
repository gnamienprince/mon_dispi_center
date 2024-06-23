<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class parametreController extends Controller
{
    //page paramètre
    public function pageParametre()
    {
        return view('pages.parametre');
    }

    public function modifierMDP(Request $request)
    {
        $validatedData = $request->validate([
            'ancien' => 'required',
            'nouveau' => 'required|string|min:8',
        ]);


        $user = Auth::user();


        //verification de la compatibilité de l'ancien mot de passe
        // Vérification de l'ancien mot de passe
        if (!Hash::check($request->ancien, $user->password)) {
            return back()->withErrors(['ancien' => 'Le mot de passe actuel est incorrect']);
        } else {
            if ($request->nouveau == $request->confirmation) {
                $user->password = Hash::make($request->nouveau);
                $user->save();

                $info = "mot de passe modifier avec succès";
                return view('pages.parametre', [
                    'info' => $info
                ]);
            }

            else{
                $info = "echec de modification du mot de passe";
                return view('pages.parametre', [
                    'info' => $info
                ]);
            } 

        }



        //dd($user);
    }
}
