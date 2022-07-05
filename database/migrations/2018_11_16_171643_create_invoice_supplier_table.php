<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('invoice_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id');
            $table->integer('rr_supplier_id');
            $table->string('invoice_num');
            $table->integer('invoice_date');
            $table->string('vat');
            $table->longText('remark');
            $table->string('status');
            $table->smallInteger('payment_status');
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
        Schema::dropIfExists('invoice_supplier');
    }
}
