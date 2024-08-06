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
        Schema::create('tranches', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('classe_id');


            $table->date('date_tranche');
            $table->dateTime('pay_at')->nullable();
            $table->bigInteger('amount');
            $table->string('transaction_id')->nullable();


            $table->foreign('subscription_id')->references('id')->on('subscriptions');
            $table->foreign('status_id')->references('id')->on('tranche_status');
            $table->foreign('classe_id')->references('id')->on('classes');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranches');
    }
};
