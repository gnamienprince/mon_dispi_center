<?php

namespace Database\Seeders;

use App\Models\Technicien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technicienDefault = new Technicien();
        $technicienDefault->id = "1";
        $technicienDefault->grade = "0";
        $technicienDefault->specialite = "0";
        $technicienDefault->user_id = "1";
        $technicienDefault->created_at = now();
        $technicienDefault->updated_at = now();
        $technicienDefault->save();
    }
}
