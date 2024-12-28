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
        Schema::table('result', function (Blueprint $table) {
            $table->foreign(['exam_id'], 'fk_exam_id')->references(['exam_id'])->on('exam')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'fk_user_id')->references(['user_id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('result', function (Blueprint $table) {
            $table->dropForeign('fk_exam_id');
            $table->dropForeign('fk_user_id');
        });
    }
};
