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
        Schema::create('dossierorange', function (Blueprint $table) {
            $table->id();
            $table->string('certificat_vie_collectif')->nullable();
            $table->string('engagement_tuteur')->nullable();
            $table->string('fiche_scolaire')->nullable();
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
        Schema::dropIfExists('dossierorange');
    }
};
