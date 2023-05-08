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
        Schema::create('celulas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('lider_id')->nullable();
            $table->unsignedBigInteger('discipulador_id')->nullable();
            $table->unsignedBigInteger('pastor_id')->nullable();
            $table->unsignedBigInteger('predio_id')->nullable();
            $table->timestamp('data_nascimento');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('celulas');
            $table->foreign('lider_id')->references('id')->on('users');
            $table->foreign('discipulador_id')->references('id')->on('users');
            $table->foreign('pastor_id')->references('id')->on('users');
            $table->foreign('predio_id')->references('id')->on('predios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celulas');
    }
};
