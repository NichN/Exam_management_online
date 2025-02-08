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
        Schema::table('exams', function (Blueprint $table) {
            $table->foreign(['subject_id'], 'exams_ibfk_1')->references(['id'])->on('subjects')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['teacher_id'], 'exams_ibfk_2')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropForeign('exams_ibfk_1');
            $table->dropForeign('exams_ibfk_2');
        });
    }
};
