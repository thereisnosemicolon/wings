<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('wmt_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_unique_code', 18);
            $table->string('product_name', 30);
            $table->double('price', 8, 2);
            $table->string('currency', 5);
            $table->double('discount', 8,2);
            $table->string('dimension', 50);
            $table->string('unit', 5);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wmt_products');
    }
};
