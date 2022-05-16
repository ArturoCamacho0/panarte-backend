<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('purchases_materials', function (Blueprint $table) {
            $table->integer('quantity');
            $table->float('total');

            $table->foreignId('purchase_id')->constrained();
            $table->foreignId('material_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases_materials');
    }
};
