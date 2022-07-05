<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rfq_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfq_id')->nullable();
            $table->integer('rfi_detail_id')->nullable();
            $table->string('sequence_number')->nullable();
            $table->integer('type_product_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('qty_rfq')->nullable();
            $table->string('um_rfq')->nullable();
            $table->string('status')->nullable();
            $table->boolean('validation_needed')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
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
        Schema::dropIfExists('rfq_detail');
    }
}
