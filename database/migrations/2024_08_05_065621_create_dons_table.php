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
        Schema::create('dons', function (Blueprint $table) {
            $table->id();

            $table->string('reference');
            $table->string('title', 255);
            $table->string('slug');
            $table->date('started');
            $table->date('finished');
            $table->bigInteger('cagnotte');
            $table->bigInteger('amount_collect')->default(0);
            $table->string('picture')->nullable();
            $table->json('tags')->nullable();
            $table->text('description');

            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};
