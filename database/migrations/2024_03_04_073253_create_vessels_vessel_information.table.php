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
        Schema::create('vessels_vessel_information', function (Blueprint $table) {
            $table->id();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('VesselName')->nullable();
            $table->string('VesselType')->nullable();
            $table->string('ImoNumber')->nullable();
            $table->string('Company')->nullable();
            $table->string('CallSign')->nullable();
            $table->string('Flag')->nullable();
            $table->string('PortOfRegistry')->nullable();
            $table->string('RegistrationOfficialNumber')->nullable();
            $table->string('Loa')->nullable();
            $table->string('Boa')->nullable();
            $table->string('DepthMouled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessels');
    }
};
