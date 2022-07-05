<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('quotation_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qs_num');
            $table->dateTime('qs_date');
            $table->integer('rfq_id');
            $table->integer('supplier_id');
            $table->integer('supplier_contact_id');
            $table->string('shipment_term');
            $table->string('payment_term');
            $table->smallInteger('import_via');
            $table->smallInteger('cost_freight');
            $table->string('cost_freight_amount');
            $table->string('qs_rating');
            $table->longText('remark');
            $table->string('attached_file')->nullable();
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
        Schema::dropIfExists('quotation_supplier');
    }
}
