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
        Schema::table('student_answers', function (Blueprint $table) {
            $table->foreign(['question_id'], 'student_answers_ibfk_1')->references(['id'])->on('questions')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['student_id'], 'student_answers_ibfk_2')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_answers', function (Blueprint $table) {
            $table->dropForeign('student_answers_ibfk_1');
            $table->dropForeign('student_answers_ibfk_2');
        });
    }
};
