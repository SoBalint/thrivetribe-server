<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CityCentrum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PostCode');
            $table->string('Name');
            $table->float('latitude', 0, 0);
            $table->float('longitude', 0, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CityCentrum');
    }
};
