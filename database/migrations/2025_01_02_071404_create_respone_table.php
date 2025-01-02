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
            $table->bigInteger('response_id', true);
            $table->bigInteger('user_id')->nullable()->index('fk_user_id');
            $table->bigInteger('question_id')->nullable()->index('fk_anwer_id');
            $table->bigInteger('answer_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent();
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
