<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingReportSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('receiving_report_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id');
            $table->string('delivery_supplier_num');
            $table->string('delivery_supplier_date');
            $table->longText('remark');
            $table->string('status');
            $table->string('invoice_status');
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
        Schema::dropIfExists('receiving_report_supplier');
    }
}
