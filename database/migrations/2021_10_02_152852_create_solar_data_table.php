<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_data', function (Blueprint $table) {
            $table->id();
            $table->text("solar_irridance")->nullable();
            $table->text("cloud_cover")->nullable();
            $table->text("temperature")->nullable();
            $table->text("humidity")->nullable();
            $table->text("wind_speed")->nullable();
            $table->text("pm_concentration")->nullable();
            $table->text('co2_concentration')->nullable();
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
        Schema::dropIfExists('solar_data');
    }
}
