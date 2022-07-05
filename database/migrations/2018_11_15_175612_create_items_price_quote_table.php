<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsPriceQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_quote_price', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('sequence_number');
            $table->string('qty_item');
            $table->string('unit_cost');   
            $table->string('sell_price');   
            $table->string('price_date');   
            $table->dateTime('price_valid_until');   
            $table->string('status');
            $table->string('created_by');
            $table->string('modified_by');
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
        Schema::dropIfExists('item_quote_price');
    }
}
