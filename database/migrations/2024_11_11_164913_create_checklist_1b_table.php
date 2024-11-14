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
        Schema::create('checklist_1b', function (Blueprint $table) {
            $table->id();
            $table->string('Boat')->nullable();
            $table->string('Date')->nullable();
            $table->string('SOPToDate')->nullable();
            $table->string('SOPToDate_Comment')->nullable();
            $table->string('CompanyOrdersToDate')->nullable();
            $table->string('CompanyOrdersToDate_Comment')->nullable();
            $table->string('LogbooksToDate')->nullable();
            $table->string('LogbooksToDate_Comment')->nullable();
            $table->string('RequisitionBookToDate')->nullable();
            $table->string('RequisitionBookToDate_Comment')->nullable();
            $table->string('PendingRequisutions_Name')->nullable();
            $table->string('PendingRequisutions_Name_Comment')->nullable();
            $table->string('SteeringSytem')->nullable();
            $table->string('SteeringSytem_Comment')->nullable();
            $table->string('EmergencySteering')->nullable();
            $table->string('EmergencySteering_Comment')->nullable();
            $table->string('NavigationalLights')->nullable();
            $table->string('NavigationalLights_Comment')->nullable();
            $table->string('SearchLight')->nullable();
            $table->string('SearchLight_Comment')->nullable();
            $table->string('A_B_Flags')->nullable();
            $table->string('A_B_Flags_Comment')->nullable();
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
        Schema::dropIfExists('checklist_1b');
    }
};
