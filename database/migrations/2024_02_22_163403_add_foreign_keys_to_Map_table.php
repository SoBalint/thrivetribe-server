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
        Schema::table('Map', function (Blueprint $table) {
            $table->foreign(['CordinationId'], 'cordination_id_fkey')->references(['id'])->on('Location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Map', function (Blueprint $table) {
            $table->dropForeign('cordination_id_fkey');
        });
    }
};
