<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->enum('status', ['sold', 'for sale', 'reserved'])->default('for sale');
            $table->string('qr_code_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn(['status', 'qr_code_path']);
        });
    }
};
