<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // Change the data type of the make_and_model column to string
            $table->string('make_and_model')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // Revert the change, specify the original column type if needed
            // Adjust as per the previous datatype (e.g., integer, text, etc.)
            $table->text('make_and_model')->change();
        });
    }
};
