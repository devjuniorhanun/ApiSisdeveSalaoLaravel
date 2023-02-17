<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('servicos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('companhia_id')->unsigned();
            $table->unsignedBigInteger('funcionario_id')->unsigned();
            $table->string('nome_servico')->nullable();
            $table->double('valor', 10, 2)->nullable();
            $table->enum('status', ["ATIVO","DESATIVADO"]);
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
        Schema::dropIfExists('servicos');
    }
}
