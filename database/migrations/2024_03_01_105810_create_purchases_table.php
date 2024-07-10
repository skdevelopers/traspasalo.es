<?php

use Carbon\Carbon;
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
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplier_id')->comment('Party ID');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->date('date')->default(Carbon::today());
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->integer('quantity');
            $table->decimal('rate', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->decimal('previous_balance', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_bills');
    }
};
