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
        Schema::table('answer', function (Blueprint $table) {
            $table->foreign(['question_id'], 'fk_answer_id')->references(['question_id'])->on('question')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answer', function (Blueprint $table) {
            $table->dropForeign('fk_answer_id');
        });
    }
};
