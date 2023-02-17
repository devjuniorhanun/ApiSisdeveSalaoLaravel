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
            $table->unsignedBigInteger('companhia_id')->unsigned();
            $table->unsignedBigInteger('funcionario_id')->unsigned();
            $table->unsignedBigInteger('cliente_id')->unsigned();
            $table->unsignedBigInteger('servico_id')->unsigned();
            $table->date('data_agendamento')->nullable();
            $table->string('horario_agendamento')->nullable();
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
