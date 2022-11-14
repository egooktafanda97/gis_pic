<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeografisInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geografis_information', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("id_kecamatan_geojson");
            $table->string("faktor");
            $table->string("sub_faktor");
            $table->string("keterangan");
            $table->string("value");
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
        Schema::dropIfExists('geografis_information');
    }
}
