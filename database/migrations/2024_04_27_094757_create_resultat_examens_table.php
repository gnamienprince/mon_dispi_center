<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultat_examens', function (Blueprint $table) {
            $table->id();
            $table->integer('statut')->default(0);
            // 0 du champs sttaut pour dire que la table resultat examen n'est pas encore saisie
            $table->string('objet');
            $table->string('interpretation');
            $table->date('dateExamen');
            $table->foreignId('consultation_id')
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreignId('examen_id')
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultat_examens');
    }
};
