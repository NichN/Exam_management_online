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
        Schema::table('respone', function (Blueprint $table) {
            $table->foreign(['answer_id'], 'fk_answer_id')->references(['answer_id'])->on('answer')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['question_id'], 'fk_question_id')->references(['question_id'])->on('question')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'respone_ibfk_1')->references(['user_id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respone', function (Blueprint $table) {
            $table->dropForeign('fk_answer_id');
            $table->dropForeign('fk_question_id');
            $table->dropForeign('respone_ibfk_1');
        });
    }
};
