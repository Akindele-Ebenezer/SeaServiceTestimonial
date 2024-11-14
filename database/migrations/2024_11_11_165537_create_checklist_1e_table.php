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
