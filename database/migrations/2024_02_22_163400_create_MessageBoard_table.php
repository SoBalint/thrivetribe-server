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
        Schema::create('MessageBoard', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Text');
            $table->integer('Like')->nullable();
            $table->date('ShareDate');
            $table->integer('UserId')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MessageBoard');
    }
};
