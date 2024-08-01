<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->unsignedBigInteger('subcategory_id')->after('category_id'); // Adding the user_id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adding the foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Dropping the foreign key constraint
            $table->dropColumn('user_id');
            $table->dropColumn('subcategory_id'); // Dropping the user_id column
        });
    }
};
