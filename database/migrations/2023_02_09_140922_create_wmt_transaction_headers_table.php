<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('wmt_transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 3);
            $table->string('document_number', 10);
            $table->unsignedBigInteger('user'); $table->foreign('user')->references('id')->on('users');
            $table->double('total', 10, 2);
            $table->enum('status', ['paid', 'unpaid']);
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('wmt_transaction_headers');
    }
};
