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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->char('gender', 1)->nullable(false);
            $table->string('cpf_cnpj')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('address_zip_code')->nullable(false);
            $table->string('address_street')->nullable(false);
            $table->string('address_number')->nullable(false);
            $table->string('address_block')->nullable(false);
            $table->string('address_city')->nullable(false);
            $table->string('address_state')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
