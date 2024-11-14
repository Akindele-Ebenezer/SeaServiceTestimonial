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
        Schema::create('checklist_1a', function (Blueprint $table) {
            $table->id();
            $table->string('Boat')->nullable();
            $table->string('Date')->nullable();
            $table->string('Port_PlaceOfHandover')->nullable();
            $table->string('OutgoingCapt_EngName')->nullable();
            $table->string('IncomingCapt_EngName')->nullable();
            $table->string('Clean_Tidy')->nullable();
            $table->string('Clean_Tidy_Comment')->nullable();
            $table->string('VHF_1')->nullable();
            $table->string('VHF_1_Comment')->nullable();
            $table->string('VHF_2')->nullable();
            $table->string('VHF_2_Comment')->nullable();
            $table->string('Handheld')->nullable();
            $table->string('Handheld_Comment')->nullable();
            $table->string('AIS')->nullable();
            $table->string('AIS_Comment')->nullable();
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
        Schema::dropIfExists('checklist_1');
    }
};
