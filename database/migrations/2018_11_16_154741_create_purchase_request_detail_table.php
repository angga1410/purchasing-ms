<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchase_request_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_id');
            $table->string('sequence_number');
            $table->integer('type_product_id');
            $table->integer('product_id');
            $table->string('qty_pr');
            $table->string('um_pr');
            $table->string('balance_qty');
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
        Schema::dropIfExists('purchase_request_detail');
    }
}
