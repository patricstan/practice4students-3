<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('base_path');
            $table->json('placeholders');
            $table->string('html_path');
            $table->enum('type', ['student', 'company', 'evaluation']);
            $table->json('fillable_by')->nullable();
            $table->enum('lang', ['eng', 'ro']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
