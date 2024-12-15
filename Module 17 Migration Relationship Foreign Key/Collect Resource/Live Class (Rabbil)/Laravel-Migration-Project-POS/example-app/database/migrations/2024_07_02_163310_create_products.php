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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            // প্রথম কন্যার বিয়ে হবে users এর সাথে

            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();


            // দ্বিতীয় কন্যার বিয়ে হবে categories এর সাথে

            $table->foreign('category_id')->references('id')->on('categories')
                ->cascadeOnUpdate()->restrictOnDelete();


            $table->string('name',50);
            $table->string('price',50);
            $table->string('unit',50);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
