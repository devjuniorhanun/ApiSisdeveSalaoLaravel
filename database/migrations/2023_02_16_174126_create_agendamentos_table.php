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
            $table->foreignId('companhia_id')->constrained();
            $table->foreignId('funcionario_id')->constrained();
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('servico_id')->constrained();
            $table->uuid('uuid');
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
