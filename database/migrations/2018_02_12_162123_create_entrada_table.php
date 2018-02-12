<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('entrada', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_usuario')->unsigned();
          $table->foreign('id_usuario')
              ->references('id')->on('users')->onDetele('set null');
          $table->integer('id_unidad')->unsigned();
          $table->foreign('id_unidad')
              ->references('id')->on('unidad')->onDetele('set null');;
          $table->date('fecha_ingreso')->nullable();
          $table->string('descripcion');
          $table->string('marca');
          $table->string('precio');
          $table->string('precio_iva');
          $table->string('cantidad');
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
        Schema::dropIfExists('entrada');
    }
}
