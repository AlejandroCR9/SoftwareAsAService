<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaConceptos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',200);
            $table->string('unidad',10);
            $table->integer('cantidad');
            $table->double('pu');
            $table->string('area',30);
            $table->integer('fk_id_proyecto');
            $table->string('estado_conceptos',15);
            $table->foreign('fk_id_proyecto')->references('id')->on('proyectos')->onDelete('cascade');
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
        Schema::dropIfExists('conceptos');
    }
}
