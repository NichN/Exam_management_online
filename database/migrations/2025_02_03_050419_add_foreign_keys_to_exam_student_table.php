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
        Schema::table('exam_student', function (Blueprint $table) {
            $table->foreign(['exam_id'], 'exam_student_ibfk_1')->references(['id'])->on('exams')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['student_id'], 'exam_student_ibfk_2')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_student', function (Blueprint $table) {
            $table->dropForeign('exam_student_ibfk_1');
            $table->dropForeign('exam_student_ibfk_2');
        });
    }
};
