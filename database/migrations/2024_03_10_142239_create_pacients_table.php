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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('DNI',8)->nullable(false)->unique();
            $table->string('NAME')->nullable(false);
            $table->string('SURNAME')->nullable(false);
            $table->integer('EDAD')->nullable(false);
            $table->string('TIPO')->nullable(false);
            $table->char('SEXO',1)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacients');
    }
};
