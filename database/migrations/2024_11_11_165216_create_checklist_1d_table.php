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
        Schema::create('checklist_1d', function (Blueprint $table) {
            $table->id();
            $table->string('Boat')->nullable();
            $table->string('Date')->nullable();
            $table->string('LifeJacketsAndWorkVest')->nullable();
            $table->string('LifeJacketsAndWorkVest_Comment')->nullable();
            $table->string('AllCrewOnBoard')->nullable();
            $table->string('AllCrewOnBoard_Comment')->nullable();
            $table->string('FuelOil')->nullable();
            $table->string('FuelOil_Comment')->nullable();
            $table->string('LubeOil')->nullable();
            $table->string('LubeOil_Comment')->nullable();
            $table->string('FreshWater')->nullable();
            $table->string('FreshWater_Comment')->nullable();
            $table->string('ConditionOfMainEngine')->nullable();
            $table->string('ConditionOfMainEngine_Comment')->nullable();
            $table->string('LubeOil_Cons_hour_Engine')->nullable();
            $table->string('LubeOil_Cons_hour_Engine_Comment')->nullable();
            $table->string('ConditionOfGearBox')->nullable();
            $table->string('ConditionOfGearBox_Comment')->nullable();
            $table->string('ConditionOfGenSet')->nullable();
            $table->string('ConditionOfGenSet_Comment')->nullable();
            $table->string('ConditionOfBilgePump')->nullable();
            $table->string('ConditionOfBilgePump_Comment')->nullable();
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
        Schema::dropIfExists('checklist_1d');
    }
};
