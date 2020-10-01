<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('products_id')->references('id')->on('products');
            $table->foreignId('providers_id')->references('id')->on('providers');
            $table->integer('quantity',5);
            $table->integer('quantitySold',5);
            $table->foreignId('priceUnity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
