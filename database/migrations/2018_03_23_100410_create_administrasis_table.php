<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrasis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('pasiens')->onDelete('CASCADE');
            $table->unsignedinteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrasis');
    }
}
