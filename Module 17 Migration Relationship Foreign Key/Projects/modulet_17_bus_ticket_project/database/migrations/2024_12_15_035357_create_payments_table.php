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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->enum('payment_method', ['cash', 'card', 'mobile']);
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->dateTime('payment_date');
            $table->timestamp('created_at')->useCurrent(); // Default to CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Updates to CURRENT_TIMESTAMP on update
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
