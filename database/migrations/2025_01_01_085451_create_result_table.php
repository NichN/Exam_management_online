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
        Schema::create('result', function (Blueprint $table) {
            $table->bigInteger('result_id', true);
            $table->bigInteger('user_id')->nullable()->index('fk_id');
            $table->bigInteger('exam_id')->nullable()->index('fk_exam_id');
            $table->decimal('total_score', 5)->nullable();
            $table->string('result_status', 1025)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result');
    }
};
