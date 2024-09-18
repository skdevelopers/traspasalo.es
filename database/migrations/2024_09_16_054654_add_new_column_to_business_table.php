<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->unsignedBigInteger('phone_no')->nullable(); // Add the new column
        });
    }
    
    public function down()
    {
        Schema::table('business', function (Blueprint $table) {
            $table->dropColumn('phone_no'); // Remove the column on rollback
        });
    }
    
};
