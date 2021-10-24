<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObjekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_objek', function (Blueprint $table) {
            $table->string('id_ow', 10);
            $table->string('nama', 100);
            $table->string('alamat', 100);
            $table->string('id_kecamatan', 10);
            $table->string('id_fasilitas', 10);
            $table->string('gambar', 100);
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
        Schema::dropIfExists('tb_objek');
    }
}
