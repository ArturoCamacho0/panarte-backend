<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stock');
            $table->string('status');
            $table->timestamps();

            $table->foreignId('category_id')->constrained();
            $table->foreignId('provider_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materials');
    }
};
