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
        Schema::create('users_api', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_completo');
            $table->char('cpf', 11);
            $table->date('nascimento');
            $table->text('foto_documento');
            $table->text('foto_usuario')->nullable();
            $table->char('telefone', 11);
            $table->integer('tipo_usuario');
            $table->string('chave_pix')->unique();
            $table->integer('reputacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_api');
    }
};
