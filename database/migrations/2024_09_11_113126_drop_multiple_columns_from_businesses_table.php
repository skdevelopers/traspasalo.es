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
        Schema::table('businesses', function (Blueprint $table) {
            // Drop foreign key constraints before dropping columns
            $table->dropForeign(['user_id']); // Drop the foreign key constraint on 'user_id'

            // Now drop the columns
            $table->dropColumn(['user_id', 'check_in', 'check_out', 'age_restriction', 'pets_permission', 'status']);
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
            // Add the columns back in case of rollback
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('check_in')->nullable();
            $table->timestamp('check_out')->nullable();
            $table->boolean('age_restriction')->nullable();
            $table->boolean('pets_permission')->nullable();
            $table->string('status')->nullable();

            // Restore the foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
