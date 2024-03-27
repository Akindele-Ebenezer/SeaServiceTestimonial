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
        Schema::create('vessels_general_others', function (Blueprint $table) {
            $table->id();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('ImoNumber')->nullable();
            $table->string('SummerLoadDraught')->nullable();
            $table->string('Lpp')->nullable();
            $table->string('Owner')->nullable();
            $table->string('Builder')->nullable();
            $table->string('DateKeelLaid')->nullable();
            $table->string('DateOfBuild')->nullable();
            $table->string('PlaceOfBuild')->nullable();
            $table->string('Material')->nullable();
            $table->string('YardNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessels_general_others');
    }
};
