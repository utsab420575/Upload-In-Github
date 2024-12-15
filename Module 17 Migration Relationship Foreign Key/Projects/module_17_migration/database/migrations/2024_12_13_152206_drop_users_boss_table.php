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
        Schema::dropIfExists('usersBoss');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Unsigned Big integer Primary key(auto increment)
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('created_at')->useCurrent(); // Default to CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Updates to CURRENT_TIMESTAMP on update
        });
    }
};
