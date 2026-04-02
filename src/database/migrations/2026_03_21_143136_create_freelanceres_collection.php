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
        Schema::create('freelanceres', function (Blueprint $collection) {
            $collection->string('user_id')->index();
            $collection->array('competences');
            $collection->array('technologies');
            $collection->double('tarif');
            $collection->string('portfolio');
            $collection->string('disponibilite');
            $collection->double('evaluations');
            $collection->string('Experience');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frelenceres_collection');
    }
};
