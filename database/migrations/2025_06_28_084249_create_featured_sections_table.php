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
        Schema::create('featured_sections', function (Blueprint $table) {
            $table->id();
            $table->string('left_image');
            $table->string('icon_image');
            $table->string('heading');
            $table->string('subheading');
            $table->json('accordions');
            $table->json('info_table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_sections');
    }
};
