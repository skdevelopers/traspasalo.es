<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cash_flows', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id')->nullable()->after('supplier_id');
            $table->unsignedBigInteger('purchase_id')->nullable()->after('sale_id');

            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('set null');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cash_flows', function (Blueprint $table) {
            $table->dropForeign(['sale_id']);
            $table->dropForeign(['purchase_id']);
            $table->dropColumn('sale_id');
            $table->dropColumn('purchase_id');
        });
    }
};
