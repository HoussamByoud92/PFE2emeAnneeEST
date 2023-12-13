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
        Schema::create('parcoursscolaire', function (Blueprint $table) {
            $table->id();
            $table->date('annee_sco');
            $table->float('moy_s1');
            $table->float('moy_s2');
            $table->float('moy_ann');
            $table->string('etablissement_sco');
            $table->string('classe');
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
        Schema::dropIfExists('parcoursscolaire');
    }
};
