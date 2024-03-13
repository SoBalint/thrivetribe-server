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
        Schema::table('UserRole', function (Blueprint $table) {
            $table->foreign(['userId'], 'user_id_fkey')->references(['id'])->on('Users')->onDelete("CASCADE");
            $table->foreign(['roleId'], 'role_id_fkey2')->references(['id'])->on('Role')->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('UserRole', function (Blueprint $table) {
            $table->dropForeign('user_id_fkey');
            $table->dropForeign('role_id_fkey2');
        });
    }
};
