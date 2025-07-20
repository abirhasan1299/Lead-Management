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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('course')->nullable();
            $table->string('unclearPaper')->nullable();
            $table->string('enrolledYear')->nullable();
            $table->string('degreePurpose')->nullable();
            $table ->string('date');
            $table->unsignedBigInteger('operation');
            $table ->string('nextfollowup')->nullable();
            $table ->string('status')->nullable();
            $table ->string('comment')->nullable();
            $table ->string('TotalFees')->nullable();
            $table ->string('paidFees')->nullable();
            $table ->string('Reference')->nullable();
            $table->foreign('operation')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
