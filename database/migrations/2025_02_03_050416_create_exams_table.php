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
        Schema::create('exams', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('subject_id')->index('subject_id');
            $table->integer('teacher_id')->index('teacher_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->enum('exam_type', ['test', 'quiz', 'midterm', 'final']);
            $table->enum('status', ['scheduled', 'active', 'completed'])->nullable()->default('scheduled');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
