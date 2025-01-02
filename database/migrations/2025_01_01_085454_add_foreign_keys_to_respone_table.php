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
            $table->foreign(['question_id'], 'fk_anwer_id')->references(['question_id'])->on('answer')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['question_id'], 'fk_qetion_id')->references(['question_id'])->on('question')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'fk_user_id')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respone', function (Blueprint $table) {
            $table->dropForeign('fk_anwer_id');
            $table->dropForeign('fk_qetion_id');
            $table->dropForeign('fk_user_id');
        });
    }
};
