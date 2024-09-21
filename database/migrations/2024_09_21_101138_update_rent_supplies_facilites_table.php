<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('facilities', function (Blueprint $table) {
            // Change rent_supplies from string to json
            $table->json('rent_supplies')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('facilities', function (Blueprint $table) {
            // Revert back to string if needed
            $table->string('rent_supplies')->nullable()->change();
        });
    }
};

