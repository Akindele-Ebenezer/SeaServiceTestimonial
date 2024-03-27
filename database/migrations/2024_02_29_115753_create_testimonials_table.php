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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('Date')->nullable();
            $table->string('EmployeeName')->nullable();
            $table->string('EmployeeId')->nullable();
            $table->string('DateOfBirth')->nullable();
            $table->string('AreaOfOperation')->nullable();
            $table->string('DischargeBook')->nullable();
            $table->string('CurrentVessel')->nullable();
            $table->string('Rank')->nullable();
            $table->string('Company')->nullable();
            $table->string('Template')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sea_service_testimonials');
    }
};
