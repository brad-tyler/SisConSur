<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            #Relación con pacientes
            $table->unsignedBigInteger('pacient_id')->nullable();
            $table->foreign('pacient_id')->references('id')->on('pacients')->onDelete('set null');

            #Relación con tamizajes
            $table->unsignedBigInteger('tamizaje_id')->nullable();
            $table->foreign('tamizaje_id')->references('id')->on('tamizajes')->onDelete('set null');

            #Relación con usuario
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->boolean('ESTADO',1)->nullable(false);
            $table->string('LUGAR')->nullable(false);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas');
    }
};
