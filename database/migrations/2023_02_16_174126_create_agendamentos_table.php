<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('agendamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('companhia_id')->references('id')->on('companhias');
            $table->foreignUuid('funcionario_id')->references('id')->on('funcionarios');
            $table->foreignUuid('cliente_id')->references('id')->on('clientes');
            $table->foreignUuid('servico_id')->references('id')->on('servicos');
            $table->date('data_agendamento')->nullable();
            $table->string('horario_agendamento')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
