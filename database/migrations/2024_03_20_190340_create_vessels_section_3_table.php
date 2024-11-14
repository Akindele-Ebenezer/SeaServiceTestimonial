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
        Schema::create('vessels_section_3', function (Blueprint $table) {
            $table->id();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('VesselName')->nullable();
            $table->string('ImoNumber')->nullable();
            $table->string('TypesOfEngines')->nullable();
            $table->string('NumberOfEngines')->nullable();
            $table->string('NumberOfCylinder')->nullable();
            $table->string('EngineOutputKw')->nullable();
            $table->string('EngineMakers')->nullable();
            $table->string('YearOfEngineBuilt')->nullable();
            $table->string('PlaceEnginesBuilt')->nullable();
            $table->string('Diametermm')->nullable();
            $table->string('LengthOfStrokemm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessels_section_3');
    }
};
