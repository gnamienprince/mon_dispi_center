<?php

namespace Database\Seeders;

use App\Models\Medecin;
use App\Models\Technicien;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'nom' => 'Teseet User',
            'prenom' => 'Test User',
            'telephone' => 'Teeestf332',
            'email' => 'tfffeeefsft@examplre.com',
            'cni' => 'Testddeeedfddddf Userr',
            'compteBanque' => 'Terfffseeetrf Userr',
            'email_verified_at' => now(),
            'password' => 'password',
            'role' => 'technicien',
            'remember_token' => 'fhfhf',
        ]);

        $actMedical = [
            ['libelleAct' => 'pansement'],
            ['libelleAct' => 'Prélèvement sanguin'],
        ];
        DB::table('act_medicals')->insert($actMedical);


        $nombreChambre = 1;
        while ($nombreChambre < 50) {

            $chambre = [
                ['description' => 'Descriptif chambre'],
            ];

            DB::table('chambres')->insert($chambre);
        };

        //création de la liste des examens à inserer dans la base de données
        $listeExamen = [
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem'],
            ['libExamen' => 'lorem']
        ];

        DB::table('examens')->insert($listeExamen);



        $numeroLit = 1;
        $numeroChambre = 1;
        $qteLitParChambre = 1;

        while ($numeroLit <= 50) {
            while ($qteLitParChambre < 5) {
                $listeLit = [
                    'description' => 'lit ',
                    'statut' => 0,
                    'chambre_id' => $numeroChambre
                ];
                DB::table('lits')->insert($listeLit);
                $qteLitParChambre = $qteLitParChambre + 1;
            }
            $numeroChambre = $numeroChambre + 1;
            $qteLitParChambre = 1;
            $numeroLit++;
        }

        $technicienDefault = new Technicien();
        $technicienDefault->id = "1";
        $technicienDefault->grade = "0";
        $technicienDefault->specialite = "0";
        $technicienDefault->user_id = "1";
        $technicienDefault->created_at = now();
        $technicienDefault->updated_at = now();
        $technicienDefault->save();


        $medecinDefault = new Medecin();
        $medecinDefault->id = "1";
        $medecinDefault->grade = "0";
        $medecinDefault->specialite = "0";
        $medecinDefault->user_id = "1";
        $medecinDefault->created_at = now();
        $medecinDefault->updated_at = now();
        $medecinDefault->save();
    }
}
