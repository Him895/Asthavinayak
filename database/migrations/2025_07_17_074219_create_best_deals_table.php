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
        Schema::create('best_deals', function (Blueprint $table) {
            $table->id();
            $table->string('type');//Appatment,villa,flat//
            $table->string('image');// property image//
            $table->string('heading');//heading ye right wala hai//
            $table->string('description');// ye paragraph hai//
            $table->string('details');//info table hai y right wala ul/li//
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_deals');
    }
};
