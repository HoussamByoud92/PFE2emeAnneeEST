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
        Schema::create('registrejournalier', function (Blueprint $table) {
            $table->id();
            $table->string('abscence')->nullable();
            $table->integer('periode_abs')->nullable();
            $table->string('justife')->nullable();
            $table->string('activite')->nullable();
            $table->string('type_act')->nullable();
            $table->time('heure_act')->nullable();
            $table->string('incident')->nullable();
            $table->string('type_incid')->nullable();
            $table->string('description_incid')->nullable();
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
        Schema::dropIfExists('registrejournalier');
    }
};
