<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('wmt_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('header');   $table->foreign('header')->references('id')->on('wmt_transaction_headers');
            $table->unsignedBigInteger('product_code');   $table->foreign('product_code')->references('id')->on('wmt_products');
            $table->double('price', 8 ,2);
            $table->double('quantity', 8,2);
            $table->string('unit', 5);
            $table->double('sub_total', 10, 2);
            $table->string('currency', 5);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wmt_transaction_details');
    }
};
