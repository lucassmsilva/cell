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
        Schema::create('celula_relatorios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('celula_id');
            $table->integer('equipe');
            $table->integer('membros');
            $table->integer('visitantes');
            $table->integer('frequentadores');
            $table->timestamp('data');
            $table->double('valor_oferta');
            $table->char('tipo')->default('C');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celula_relatorios');
    }
};
