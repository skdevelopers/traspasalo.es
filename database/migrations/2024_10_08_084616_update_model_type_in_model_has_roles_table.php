<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update the model_type field in the model_has_roles table
        DB::table('model_has_roles')
            ->where('model_type', 'AppModelsUser')
            ->update(['model_type' => 'App\\Models\\User']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Optionally, you can reverse the change if needed
        DB::table('model_has_roles')
            ->where('model_type', 'App\\Models\\User')
            ->update(['model_type' => 'AppModelsUser']);
    }
};
