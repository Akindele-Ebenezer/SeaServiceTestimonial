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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('FullName')->nullable();
            $table->string('Email')->unique();
            $table->string('Password')->nullable();
            $table->string('Department')->nullable();
            $table->string('Position')->nullable();
            $table->string('Role')->nullable();
            $table->string('LastLogin')->nullable();
            $table->string('LastLogout')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
