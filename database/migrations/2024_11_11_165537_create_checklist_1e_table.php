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
        Schema::create('checklist_1e', function (Blueprint $table) {
            $table->id();
            $table->string('Boat')->nullable();
            $table->string('Date')->nullable();
            $table->string('ConditionOfBilgeSystem')->nullable();
            $table->string('ConditionOfBilgeSystem_Comment')->nullable();
            $table->string('ConditionOfBattery')->nullable();
            $table->string('ConditionOfBattery_Comment')->nullable();
            $table->string('ShoreConnectionCables')->nullable(); 
            $table->string('ShoreConnectionCables_Comment')->nullable(); 
            $table->string('Outgoing_Captain_Engineer')->nullable(); 
            $table->string('Incoming_Captain_Engineer')->nullable(); 
            $table->string('DeckMaintenanceCondition')->nullable(); 
            $table->string('AccommodationMaintenanceCondition')->nullable(); 
            $table->string('PilotHandrailsCondition')->nullable(); 
            $table->string('TyreFenderCondition')->nullable(); 
            $table->string('HullFendersCondition')->nullable(); 
            $table->string('GarbageCollecting')->nullable(); 
            $table->string('GarbageDepositing')->nullable(); 
            $table->string('EngineSmoking')->nullable(); 
            $table->string('Extinguishers_Exp_Date')->nullable(); 
            $table->string('FireHosesCondition')->nullable(); 
            $table->string('Nozzles_NoCondition')->nullable(); 
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
        Schema::dropIfExists('checklist_1e');
    }
};
