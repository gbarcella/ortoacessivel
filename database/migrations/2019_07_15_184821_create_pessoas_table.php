<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->string('nome');
            $table->string('sobrenome');
            $table->string('telefone');
            $table->string('telefone2')->nullable();
            $table->string('nascimento');
            $table->string('email')->nullable();
            $table->string('sexo');
            $table->string('renda');
            $table->string('cpf');
            $table->string('estado');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('numero');

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
        Schema::dropIfExists('pessoas');
    }
}
