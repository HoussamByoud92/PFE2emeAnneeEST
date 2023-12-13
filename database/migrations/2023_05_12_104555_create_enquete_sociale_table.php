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
        Schema::create('enquete_sociale', function (Blueprint $table) {
            $table->id();
            $table->date('date_enquete');
            $table->string('adresse_enfant')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('info_enfant')->nullable();
            $table->string('nom_prenom')->nullable();
            $table->string('niveau_scolaire')->nullable();
            $table->string('etat_social')->nullable();
            $table->string('etat_sante')->nullable();
            $table->integer('nbr_frr')->nullable();
            $table->integer('nbr_soeur')->nullable();
            $table->integer('tuteur_age')->nullable();
            $table->string('tuteur_metier')->nullable();
            $table->string('tuteur_sante')->nullable();
            $table->string('tuteur_etat')->nullable();
            $table->string('etat_scolarite')->nullable();
            $table->string('frr_nom')->nullable();
            $table->date('frr_date_nais')->nullable();
            $table->string('frr_scolarite')->nullable();
            $table->string('frr_etat')->nullable();
            $table->string('frr_metier')->nullable();
            $table->string('origine_geographique')->nullable();
            $table->string('type_residence')->nullable();
            $table->string('residence')->nullable();
            $table->string('nbr_chambre')->nullable();
            $table->string('nbr_membre_famille')->nullable();
            $table->string('nbr_habitant')->nullable();
            $table->string('source_de_vie')->nullable();
            $table->unsignedBigInteger('id_demande');
            $table->foreign('id_demande')->references('id')->on('demande');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquete_sociale');
    }
};
