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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->onDelete('cascade');
            $table->string('specialization')->nullable();
            $table->text('about')->nullable();
            $table->json('skills')->nullable();
            $table->string('last_year_grade')->nullable();
            $table->json('foreign_languages')->nullable();
            $table->json('hobbies')->nullable();
            $table->json('education')->nullable();
            $table->json('experience')->nullable();
            $table->json('projects')->nullable();
            $table->boolean('completed_practice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
