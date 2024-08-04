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
        Schema::create('subscriptions', function (Blueprint $table) {

            $table->id();
            $table->string('reference');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cursus_id');
            $table->unsignedBigInteger('status_id')->default(1);

            $table->dateTime('date_inscription');
            $table->bigInteger('amount');
            $table->dateTime('last_paiement');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cursus_id')->references('id')->on('cursus');
            $table->foreign('status_id')->references('id')->on('status');

            $table->dateTime('pay_inscription');
            $table->bigInteger('amount_inscription');
            $table->dateTime('started_at');
            $table->dateTime('finish_at')->nullable();

            $table->string('method_pay');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
