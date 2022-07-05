<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrSupplierDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rr_supplier_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rr_suplier_id');
            $table->integer('pos_detail_id');
            $table->string('sequence_no');
            $table->integer('product_id');
            $table->string('qty_rr_supplier');
            $table->string('um_rr_supplier');
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
        Schema::dropIfExists('rr_supplier_detail');
    }
}
