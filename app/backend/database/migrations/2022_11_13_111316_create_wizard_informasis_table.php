<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWizardInformasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wizard_informasi', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("id_kecamatan_geojson");
            $table->string("table");
            $table->longText("data");
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
        Schema::dropIfExists('wizard_informasi');
    }
}
