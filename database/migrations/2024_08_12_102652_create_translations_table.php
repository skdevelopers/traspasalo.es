<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('language', 2);
            $table->text('value');
            $table->timestamps();

            $table->unique(['key', 'language']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('translations');
    }
};
