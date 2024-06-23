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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('constante');
                 
            $table->string('diagnostique')->nullable();
             
            $table->string('pathologie')->nullable();
            $table->string('prescription')->nullable();
            $table->date('dateRDV')->nullable();
            $table->integer('statutConsultation')->nullable();
            //0 pour non terminer et 1 pour terminer
            $table->foreignId('medecin_id')
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->timestamps();
            $table->foreignId('dossier_patient_id')
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
