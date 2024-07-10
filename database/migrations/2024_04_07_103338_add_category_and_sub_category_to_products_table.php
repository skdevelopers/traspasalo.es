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
        Schema::table('products', function (Blueprint $table) {
            // Add category_id column
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            // Add subcategory_id column
            $table->unsignedBigInteger('subcategory_id')->nullable()->after('category_id');
            $table->foreign('subcategory_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['subcategory_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('subcategory_id');
        });
    }
};
