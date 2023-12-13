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
        Schema::create('dossiermedical', function (Blueprint $table) {
            $table->id();
            $table->integer('poids')->nullable();
            $table->integer('taille')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->string('antecedent_perso_familiaux')->nullable();
            $table->string('examen_digestif')->nullable();
            $table->string('examen_cardio_vasculaire')->nullable();
            $table->string('examen_pluro_pulmonaire')->nullable();
            $table->string('examen_neurologique')->nullable();
            $table->string('examen_urologique')->nullable();
            $table->string('examen_dermatologique')->nullable();
            $table->string('aires_gonglionnaire')->nullable();
            $table->string('examen_sanguin')->nullable();
            $table->string('etat_vaccinal')->nullable();
            $table->string('conclusion')->nullable();
            $table->date('date')->nullable();
            $table->string('medecin')->nullable();
            $table->unsignedBigInteger('id_benef');
            $table->foreign('id_benef')->references('id')->on('beneficiaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiermedical');
    }
};
