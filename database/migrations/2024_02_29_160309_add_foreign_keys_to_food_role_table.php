<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('food_role', function (Blueprint $table) {
            $table->foreign(['diet_id'], 'diet_id_fkey')->references(['id'])->on('Diet')->onDelete("CASCADE");
            $table->foreign(['food_id'], 'food_id_fkey2')->references(['id'])->on('Food')->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_role', function (Blueprint $table) {
            $table->dropForeign('diet_id_fkey');
            $table->dropForeign('food_id_fkey2');
        });
    }
};
