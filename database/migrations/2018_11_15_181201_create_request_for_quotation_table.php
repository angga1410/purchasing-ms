<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestForQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('request_for_quotation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfi_id');
            $table->integer('supplier_id');
            $table->integer('supplier_contact_id');
            $table->string('inquiry_customer');
            $table->string('vendor_reference');
            $table->string('order_date');
            $table->string('rfq_number');
            $table->string('status');
            $table->string('created_by');
            $table->string('modified_by');
            $table->integer('day');
            $table->integer('project_count')->default(0);
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
        Schema::dropIfExists('request_for_quotation');
    }
}
