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
        Schema::create('hero_section', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('company_name')->nullable();
            $table->longText('label')->nullable();
            $table->json('heading')->nullable();
            $table->json('buttons')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_section');
    }
};
