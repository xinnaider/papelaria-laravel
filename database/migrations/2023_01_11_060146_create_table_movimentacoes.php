<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->string('tipo');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->integer('venda_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('venda_id')->references('id')->on('vendas');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
};
