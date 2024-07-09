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
        Schema::create('vessel_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('Vessel')->nullable();
            $table->string('Status')->nullable();
            $table->string('DoneBy')->nullable();
            $table->string('Attachment')->nullable();
            $table->string('Comment')->nullable();
            $table->string('Report')->nullable();
            $table->string('Picture')->nullable();
            $table->string('Location')->nullable();
            $table->string('Source')->nullable();
            $table->string('StartTime')->nullable();
            $table->string('EndTime')->nullable();
            $table->string('StartDate')->nullable();
            $table->string('EndDate')->nullable();
            $table->string('TillNow')->nullable();
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
        Schema::dropIfExists('vessel_availabilities');
    }
};
