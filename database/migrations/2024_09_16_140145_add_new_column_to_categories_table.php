<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Add a new column (e.g., description)
            $table->string('icon_class')->nullable()->after('name');  // You can change the column type based on your requirements
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop the new column if the migration is rolled back
            $table->dropColumn('icon_classs');
        });
    }
};
