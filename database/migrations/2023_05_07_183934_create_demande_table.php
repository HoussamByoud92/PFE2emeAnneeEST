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
        Schema::create('demande', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom')->nullable();
            $table->string('CIN')->nullable();
            $table->date('date_expiration')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pere_ou_mere')->nullable();
            $table->string('autre')->nullable();
            $table->string('nom_prenom_enfant')->nullable();
            $table->string('etablissement')->nullable();
            $table->string('cause')->nullable();
            $table->string('orphelinat')->nullable();
            $table->string('violence')->nullable();
            $table->string('exploitation')->nullable();
            $table->string('type_exploitation')->nullable();
            $table->string('lieu_demande')->nullable();
            $table->date('date_demande')->nullable();
            $table->string('demande_version_egalisé')->nullable();
            $table->string('etat')->nullable();
            $table->unsignedBigInteger('id_benf');
            $table->foreign('id_benf')->references('id')->on('beneficiaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande');
    }
};
