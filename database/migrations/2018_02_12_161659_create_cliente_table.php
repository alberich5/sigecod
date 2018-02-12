<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cliente', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_usuario')->unsigned();
          $table->foreign('id_usuario')
              ->references('id')->on('users')->onDetele('set null');
          $table->string('nombre');
          $table->date('fecha')->nullable();
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
        Schema::dropIfExists('cliente');
    }
}
