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
        Schema::create('checklist_1c', function (Blueprint $table) {
            $table->id();
            $table->string('Boat')->nullable();
            $table->string('Date')->nullable();
            $table->string('Siren_Horn')->nullable();
            $table->string('Siren_Horn_Comment')->nullable();
            $table->string('MagneticCompass')->nullable();
            $table->string('MagneticCompass_Comment')->nullable();
            $table->string('Radar')->nullable();
            $table->string('Radar_Comment')->nullable();
            $table->string('EchoSounder')->nullable();
            $table->string('EchoSounder_Comment')->nullable();
            $table->string('GPS')->nullable();
            $table->string('GPS_Comment')->nullable();
            $table->string('BitsAndBollards')->nullable();
            $table->string('BitsAndBollards_Comment')->nullable();
            $table->string('ConditionOfRopes')->nullable();
            $table->string('ConditionOfRopes_Comment')->nullable();
            $table->string('ConditionOfWindows')->nullable();
            $table->string('ConditionOfWindows_Comment')->nullable();
            $table->string('LifeRaftsAndCradles')->nullable();
            $table->string('LifeRaftsAndCradles_Comment')->nullable();
            $table->string('LifeRings')->nullable();
            $table->string('LifeRings_Comment')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_1c');
    }
};
