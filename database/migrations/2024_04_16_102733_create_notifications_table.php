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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('UserId')->nullable();
            $table->string('Vessel')->nullable();
            $table->string('Company')->nullable();
            $table->string('Action')->nullable();
            $table->string('Subject')->nullable();
            $table->string('Notification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
