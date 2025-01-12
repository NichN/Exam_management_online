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
        Schema::create('question', function (Blueprint $table) {
            $table->bigInteger('question_id', true);
            $table->bigInteger('exam_id')->nullable()->index('fk_question_id');
            $table->string('content', 1025)->nullable();
            $table->decimal('mark', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
