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
        Schema::create('Training', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->text('Text');
            $table->integer('Like')->nullable();
            $table->integer('DisLike')->nullable();
            $table->string('Type');
            $table->date('UploadeDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Training');
    }
};
