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
        Schema::create('carrinho_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrinho_id')->nullable();
            $table->unsignedBigInteger('produto_id')->nullable();           
            $table->integer('quantidade')->nullable();
            $table->boolean('finalizado')->default(false);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinho_compras');
    }
};
