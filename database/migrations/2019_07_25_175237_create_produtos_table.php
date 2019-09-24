<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('id_parceiro')->unsigned();
            $table->foreign('id_parceiro')->references('id')->on('parceiros')->onDelete('cascade');

            $table->string('codigo_identificacao');
            $table->string('nome');
            $table->string('data_recebimento');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('estado');
            $table->string('procedencia');
            $table->string('status')->default('Disponível');
            $table->string('descricao')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
