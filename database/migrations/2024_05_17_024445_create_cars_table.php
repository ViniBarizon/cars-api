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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('model')->nullable(false);
            $table->string('brand')->nullable(false);
            $table->string('license_plate')->nullable(false);
            $table->integer('year')->nullable(false);
            $table->string('color')->nullable(false);
            $table->string('chassis_number')->nullable(false);
            $table->string('engine_number')->nullable(false);
            $table->string('type')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
