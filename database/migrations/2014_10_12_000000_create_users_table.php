<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->comment('Nombre del usuario');
            $table->string('Apell')->comment('Apellido del usuario');
            $table->date('f_nac')->comment('Fecha de nacimiento');
            $table->string('acc',30)->comment('Tipo de acceso');
            $table->string('email')->unique()->comment('Email');
            $table->timestamp('email_verified_at')->nullable()->comment('Verificar email');
            $table->string('password')->comment('Ingresar Contraseña');
            $table->string('api_token', 80)
            ->unique()
            ->nullable()
            ->default(null);
            $table->string('menuroles');
            $table->string('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
