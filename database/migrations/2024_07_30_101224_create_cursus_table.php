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
        Schema::create('cursus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            //$table->string('slug')->unique();
            $table->integer('nombre_year');
            $table->integer('duree_mensuelle');
            $table->integer('forfait_mensuel');
            $table->integer('montant_inscription');
            $table->integer('montant_cursus');
            $table->boolean('status')->default(true);
            $table->json('classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursus');
    }
};
