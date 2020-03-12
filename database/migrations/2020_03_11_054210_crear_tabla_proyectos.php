<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_proyecto', 15);
            $table->string('tipo_proyecto', 20);
            $table->string('ubicacion', 100);
            $table->string('estado', 15);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('fk_id_lider');
            $table->integer('fk_id_cliente');
            $table->foreign('fk_id_lider')->references('id')->on('trabajadores')->onDelete('cascade');
            $table->foreign('fk_id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
