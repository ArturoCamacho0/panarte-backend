<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materials_products', function (Blueprint $table) {
            $table->foreignId('material_id')->constrained();
            $table->foreignId('product_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials_products');
    }
};
