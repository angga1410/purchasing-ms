<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsBufferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_buffer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convert_product_id');
            $table->smallInteger('category_part_num');
            $table->string('mfr');
            $table->string('part_num');
            $table->string('part_name');   
            $table->string('part_desc');   
            $table->string('default_um');   
            $table->string('default_curr');   
            $table->string('unit_cost');   
            $table->string('sell_price');   
            $table->boolean('break_down_price');   
            $table->string('price_date');   
            $table->string('lead_time');   
            $table->dateTime('price_valid_until');
            $table->boolean('item_need_qc');
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
        Schema::dropIfExists('items_buffer');
    }
}
