<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('account_types', function (Blueprint $table) {
            $table->text('monthly_description')->nullable()->after('monthly_price');
            $table->text('yearly_description')->nullable()->after('yearly_price');
            $table->dropColumn('descriptions');
        });
    }

    public function down(): void
    {
        Schema::table('account_types', function (Blueprint $table) {
            $table->dropColumn(['monthly_description', 'yearly_description']);
            $table->text('descriptions');
        });
    }
};
