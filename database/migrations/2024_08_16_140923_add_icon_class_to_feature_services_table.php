<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('feature_services', function (Blueprint $table) {
            $table->string('icon_class')->nullable()->after('name'); // Adjust 'some_existing_column' to place it after a specific column if needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feature_services', function (Blueprint $table) {
            $table->dropColumn('icon_class');
        });
    }
};
