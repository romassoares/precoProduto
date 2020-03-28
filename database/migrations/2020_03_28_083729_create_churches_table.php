<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->char('nome', 100)->nullable();
            // endereço
            $table->string('cep', 8);
            $table->string('city', 60);
            $table->string('neighborhood', 60)->nullable();
            $table->string('street', 60)->nullable();
            $table->string('number', 7)->nullable();
            $table->enum('zone', ['u', 'r'])->nullable();
            $table->string('complement');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('churches');
    }
}
