<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_philosophies', function (Blueprint $table) {
            $table->id();
            $table->longText('philosophy_text')->nullable();
            $table->json('features')->nullable();
            $table->json('policies')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_philosophies');
    }
};