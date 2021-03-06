<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->integer('stock');
            $table->string('status');
            $table->timestamps();

            $table->foreignId('category_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
