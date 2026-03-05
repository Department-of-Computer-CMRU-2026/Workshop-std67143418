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
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['student_name', 'student_email', 'student_id']);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unique(['user_id', 'workshop_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'workshop_id']);
            $table->dropColumn('user_id');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_id')->nullable();
        });
    }
};
