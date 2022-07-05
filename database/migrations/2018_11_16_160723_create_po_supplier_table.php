<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('po_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_id');
            $table->integer('rfq_id');
            $table->integer('supplier_id');
            $table->integer('supplier_contact_id');
            $table->string('shipment_term');
            $table->string('payment_term');
            $table->smallInteger('import_via');
            $table->smallInteger('cost_freight');
            $table->string('cost_freight_amount');
            $table->string('vat');
            $table->string('qs_rating');
            $table->longText('remark');
            $table->string('attached_file');
            $table->string('status');
            $table->smallInteger('invoice_status');
            $table->string('pos_supplier_rating');
            $table->boolean('approved')->default(0);
            $table->string('approved_by');
            $table->dateTime('approved_date');
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
        Schema::dropIfExists('po_supplier');
    }
}
