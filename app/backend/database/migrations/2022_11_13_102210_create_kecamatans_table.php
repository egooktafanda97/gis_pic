<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geojson_kecamatan', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("kode_kecamatan");
            $table->string("nama_kecamatan");
            $table->text("geojson");
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
        Schema::dropIfExists('geojson_kecamatan');
    }
}
