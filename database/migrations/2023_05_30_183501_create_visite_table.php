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
        Schema::create('visite', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('rapport')->nullable();
            $table->unsignedBigInteger('id_benef');
            $table->foreign('id_benef')->references('id')->on('beneficiaire');
            $table->unsignedBigInteger('id_tuteur');
            $table->foreign('id_tuteur')->references('id')->on('tuteur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visite');
    }
};
