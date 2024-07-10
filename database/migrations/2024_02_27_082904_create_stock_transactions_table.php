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
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('inventory_id');
            $table->enum('transaction_type', ['purchase', 'sale']);
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2); // Unit price at the time of the transaction
            $table->decimal('total_value', 15, 2); // Total value at the time of the transaction
            $table->date('transaction_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};
