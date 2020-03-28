<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('church_id');
            $table->foreign('church_id')->references('id')->on('churches');
            $table->unsignedBigInteger('dirigente_id');
            $table->foreign('dirigente_id')->references('id')->on('users');
            $table->unsignedBigInteger('pregador_id');
            $table->foreign('pregador_id')->references('id')->on('users');
            $table->string('description', 60)->nullable();
            $table->date('data')->nullable();
            $table->string('complement', 100)->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
