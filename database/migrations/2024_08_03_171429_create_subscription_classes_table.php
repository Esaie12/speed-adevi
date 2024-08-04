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
        Schema::create('subscription_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('status_id')->default(1);


            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');
            $table->foreign('status_id')->references('id')->on('tranche_status');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_classes');
    }
};
