<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanhiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('companhias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome')->nullable()->unique();
            $table->string('latitude')->nullable();
            $table->string('longitute')->nullable();
            $table->string('telefone')->nullable();
            $table->string('logo')->nullable();
            $table->string('social_link')->nullable();
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
        Schema::dropIfExists('companhias');
    }
}
