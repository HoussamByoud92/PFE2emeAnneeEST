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
        Schema::create('_parcour_scolaire', function (Blueprint $table) {
            $table->id();
            $table->integer('id_par');
            $table->date('annee_sco');
            $table->float('moy_s1');
            $table->float('moy_s2');
            $table->float('moy_ann');
            $table->string('etablissement_sco');
            $table->string('classe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_parcour_scolaire');
    }
};
