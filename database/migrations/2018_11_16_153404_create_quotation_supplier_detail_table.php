<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationSupplierDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('quotation_supplier_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qs_id');
            $table->integer('rfq_detail_id');
            $table->string('sequence_no');
            $table->integer('type_product_id');
            $table->integer('product_id');
            $table->string('qty_qs');
            $table->string('um_qs');
            $table->string('curr');
            $table->string('unit_price');
            $table->string('lead_time');
            $table->dateTime('price_valid_until');
            $table->string('status');
            $table->boolean('validated');
            $table->string('validated_by');
            $table->dateTime('validated_date');
            $table->boolean('approved');
            $table->string('approved_by');
            $table->string('approved_date');
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
        Schema::dropIfExists('quotation_supplier_detail');
    }
}
