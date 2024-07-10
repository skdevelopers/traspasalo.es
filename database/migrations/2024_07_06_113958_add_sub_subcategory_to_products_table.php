<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubSubcategoryToProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add sub_subcategory_id column
            $table->unsignedBigInteger('sub_subcategory_id')->nullable()->after('subcategory_id');
            $table->foreign('sub_subcategory_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['sub_subcategory_id']);
            $table->dropColumn('sub_subcategory_id');
        });
    }
}
