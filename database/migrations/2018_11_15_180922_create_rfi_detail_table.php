<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rfi_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfi_id');
            $table->string('sequence_number');
            $table->integer('type_product_id');
            $table->integer('product_id');
            $table->string('qty_rfi');
            $table->string('um_rfi');
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
        Schema::dropIfExists('rfi_detail');
    }
}
