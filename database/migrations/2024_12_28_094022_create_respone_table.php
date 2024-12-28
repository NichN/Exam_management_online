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
        Schema::create('respone', function (Blueprint $table) {
            $table->integer('response_id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('question_id')->nullable()->index('fk_question_id');
            $table->integer('answer_id')->nullable()->index('fk_answer_id');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respone');
    }
};
