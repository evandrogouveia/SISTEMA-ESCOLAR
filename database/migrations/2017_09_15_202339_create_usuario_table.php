<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idusuario');
            $table->string('nome', 50);
            $table->string('login', 50)->unique();
            $table->string('password');
            $table->string('perfil');
        });

        Schema::table('usuario', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('usuario');
    }

}
