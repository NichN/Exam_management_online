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
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('course_id', 'subjects_ibfk_1')  // Reference column and name of the foreign key constraint
                ->references('id')  // The referenced column in the courses table
                ->on('courses')  // The table that is being referenced
                ->onUpdate('restrict')  // Action on update
                ->onDelete('cascade');  // Action on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_ibfk_1');
        });
    }
};
