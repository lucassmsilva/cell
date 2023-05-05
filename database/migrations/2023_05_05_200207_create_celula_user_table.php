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
        Schema::create('celula_user', function (Blueprint $table) {
            $table->foreignId('celula_id');
            $table->integer('user_id');
            $table->foreign('celula_id')->references('id')->on('celulas')->onDelete('cascade');
            $table->primary(['celula_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celula_user');
    }
};
