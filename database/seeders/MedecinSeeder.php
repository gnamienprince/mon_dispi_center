<?php

namespace Database\Seeders;

use App\Models\Medecin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedecinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medecinDefault = new Medecin;
        $medecinDefault->id = "1";
        $medecinDefault->grade = "0";
        $medecinDefault->specialite = "0";
        $medecinDefault->user_id = "1";
        $medecinDefault->created_at = now();
        $medecinDefault->updated_at = now();
        $medecinDefault->save();
    }
}
