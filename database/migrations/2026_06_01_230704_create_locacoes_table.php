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
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_locacao');
            $table->dateTime('data_retorno');
            $table->float('desconto');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacoes');
    }
};
