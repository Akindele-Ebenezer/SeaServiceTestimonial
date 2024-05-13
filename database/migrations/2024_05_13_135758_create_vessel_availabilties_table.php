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
        Schema::create('vessel_availabilties', function (Blueprint $table) {
            $table->id();
            $table->string('Vessel')->nullable();
            $table->string('Status')->nullable();
            $table->string('DoneBy')->nullable();
            $table->string('Attachment')->nullable();
            $table->string('StartTime')->nullable();
            $table->string('EndTime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessel_availabilties');
    }
};
