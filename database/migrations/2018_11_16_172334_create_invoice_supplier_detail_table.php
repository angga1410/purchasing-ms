<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSupplierDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('invoice_supplier_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_supplier_id');
            $table->integer('rr_supplier_detail_id');
            $table->integer('pos_detail_id');
            $table->string('sequence_no');
            $table->integer('product_id');
            $table->string('qty_invoice_supplier');
            $table->string('um_invoice_supplier');
            $table->string('curr');
            $table->string('unit_price');
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
        Schema::dropIfExists('invoice_supplier_detail');
    }
}
