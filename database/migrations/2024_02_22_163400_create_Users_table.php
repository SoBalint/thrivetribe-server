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
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UserName')->unique();
            $table->string('Password');
            $table->string('Email');
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('Height')->nullable();
            $table->integer('Weight')->nullable();
            $table->integer('Age')->nullable();
            $table->string('Phone', 12)->nullable();
            $table->integer('FavouriteDietId')->nullable()->unsigned();
            $table->integer('FavouriteTrainingId')->nullable()->unsigned();
            $table->integer('CoachExperienceId')->nullable()->unsigned();
            $table->date('LastLogin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
};
