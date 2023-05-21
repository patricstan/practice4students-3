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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date');
            $table->boolean('is_paid');
            $table->string('salary')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('is_remote')->nullable();
            $table->string('city');
            $table->json('skills');
            $table->text('description');
            $table->json('applied')->nullable();
            $table->json('accepted')->nullable();
            $table->boolean('is_available')->default(true);
            $table->foreignId('company_id')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
