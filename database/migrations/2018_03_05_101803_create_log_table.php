<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('log', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_entrada')->unsigned();
          $table->foreign('id_entrada')
              ->references('id')->on('entrada')->onDetele('set null');
          $table->integer('id_cliente')->unsigned();
          $table->foreign('id_cliente')
              ->references('id')->on('cliente')->onDetele('set null');
          $table->integer('id_usuario')->unsigned();
          $table->foreign('id_usuario')
                  ->references('id')->on('users')->onDetele('set null');
          $table->integer('cantidad_inicial');
          $table->date('fecha_log')->nullable();
          $table->timestamp('created_at')->nullable();
          $table->timestamp('updated_at')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('log');
    }
}
