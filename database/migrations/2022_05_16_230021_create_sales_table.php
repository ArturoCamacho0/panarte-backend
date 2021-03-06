<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->float('total');
            $table->string('status');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('customer_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
