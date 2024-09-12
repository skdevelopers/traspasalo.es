<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->string('state_supplies')->nullable();
            $table->string('rent_supplies')->nullable();
            $table->dropColumn('supplies');
        });
    }
    
    public function down()
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropColumn(['state_supplies', 'rent_supplies']);
            $table->string('supplies')->nullable();
        });
    }
    
};
