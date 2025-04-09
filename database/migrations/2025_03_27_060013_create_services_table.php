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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('rubric');  // okazyvau_uslugi, vospolzuus_uslugami
            $table->string('title', length:50);
            $table->integer('price')->nullable();
            // $table->string('price_type')->nullable();
            $table->string('descr', length:3000)->nullable();
            // $table->string('tag');
            $table->string('contact');
            $table->boolean('whatsapp')->nullable();
            $table->integer('user_id'); // id пользователя объявления
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
