<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales_products', function (Blueprint $table) {
            $table->integer('quantity');
            $table->float('total');

            $table->foreignId('sale_id')->constrained();
            $table->foreignId('product_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_products');
    }
};
