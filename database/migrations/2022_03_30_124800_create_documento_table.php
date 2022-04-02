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
        Schema::create('document', function (Blueprint $table) {
            $table->bigIncrements('id_document');
			$table->bigIncrements('id_prospecto');
            $table->string('nombre_document',255)->comment('nombre del documento');
            $table->string('ruta_document',255)->comment('ruta del archivo');
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
        Schema::dropIfExists('document');
    }
}
