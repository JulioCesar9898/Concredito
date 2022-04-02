<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla prospectos
        Schema::create('prospecto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom',50)->comment('Nombre del prospecto');
            $table->string('apell_p',50)->comment('Apellido Paterno del prospecto');
            $table->string('apell_m',50)->comment('Apellido Materno del prospecto');
            $table->string('calle_',30)->comment('Calle');
            $table->integer('numero')->comment('numero de dirreccion');
            $table->string('colonia',100)->nullable()->comment('colonia');
            $table->string('cp',5);
            $table->integer('telefono');
            $table->string('RFC', 80);
            $table->string('observacion');
            $table->string('status');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prospecto');
    }
}
