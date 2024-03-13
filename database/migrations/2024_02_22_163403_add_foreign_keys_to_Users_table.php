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
        Schema::table('Users', function (Blueprint $table) {
            $table->foreign(['FavouriteDietId'], 'favourite_foood_id')->references(['id'])->on('Diet');
            $table->foreign(['FavouriteTrainingId'], 'favourite_tarining_id')->references(['id'])->on('Training');
            $table->foreign(['CoachExperienceId'], 'coachexperience_id')->references(['id'])->on('CoachExperience');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->dropForeign('favourite_foood_id');
            $table->dropForeign('favourite_tarining_id');
            $table->dropForeign('coachexperience_id');
        });
    }
};
