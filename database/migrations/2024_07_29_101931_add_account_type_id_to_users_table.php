<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    
        public function up()
        {
            Schema::create('account_types', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->decimal('monthly_price', 8, 2);
                $table->decimal('yearly_price', 8, 2);
                $table->json('descriptions')->nullable();
                $table->timestamps();
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('account_types');
        }
};
