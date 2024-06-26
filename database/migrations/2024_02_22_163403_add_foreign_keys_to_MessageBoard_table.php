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
        Schema::table('MessageBoard', function (Blueprint $table) {
            $table->foreign(['UserId'], 'user_id_fkeymb')->references(['id'])->on('Users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('MessageBoard', function (Blueprint $table) {
            $table->dropForeign('user_id_fkeymb');
        });
    }
};
