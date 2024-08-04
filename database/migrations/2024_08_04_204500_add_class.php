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
        Schema::table('tranches', function (Blueprint $table) {

            $table->unsignedBigInteger('classe_id')->after('subscription_id');

            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tranches', function (Blueprint $table) {
            //
        });
    }
};
