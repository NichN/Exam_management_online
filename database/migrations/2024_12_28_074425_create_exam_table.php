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
        Schema::create('exam', function (Blueprint $table) {
            $table->integer('exam_id', true);
            $table->string('title', 1025)->nullable();
            $table->dateTime('duration')->nullable();
            $table->integer('user_id')->nullable()->index('user_id');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('category_id')->nullable()->index('fk_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam');
    }
};
