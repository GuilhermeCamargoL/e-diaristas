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
        Schema::create('diarista_servico', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_api_id');
            $table->foreign('user_api_id')->references('id')->on('users_api')->onDelete('cascade');

            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');

            $table->decimal('valor', 10, 2);
            $table->unsignedTinyInteger('tempo_estimado_horas')->default(1);

            $table->timestamps();

            $table->unique(['user_api_id', 'servico_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diarista_servico');
    }
};
