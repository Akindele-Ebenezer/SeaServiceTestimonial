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
        Schema::create('working_periods', function (Blueprint $table) {
            $table->id();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('Vessel')->nullable();
            $table->string('StartDate_1')->nullable();
            $table->string('EndDate_1')->nullable();
            $table->string('StartDate_2')->nullable();
            $table->string('EndDate_2')->nullable();
            $table->string('StartDate_3')->nullable();
            $table->string('EndDate_3')->nullable();
            $table->string('StartDate_4')->nullable();
            $table->string('EndDate_4')->nullable();
            $table->string('StartDate_5')->nullable();
            $table->string('EndDate_5')->nullable();
            $table->string('EmployeeId')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_periods');
    }
};
