<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key for the orders table

            // Foreign key referencing the users_infos table
            $table
                ->foreignId('user_id')
                ->constrained('users_infos') // Reference to the users_infos table
                ->restrictOnDelete() // Prevent deletion of the parent while child rows exist
                ->cascadeOnUpdate(); // Update child rows when the parent row is updated

            $table->string('product_order', 255); // Name of the product
            $table->decimal('total_paid', 10, 2); // Decimal field for monetary values
            $table->timestamp('created_at')->useCurrent(); // Default to CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();// Updates to CURRENT_TIMESTAMP
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
