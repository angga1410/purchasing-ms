<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('claim_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id');
            $table->integer('supplier_id');
            $table->integer('supplier_contact_id');
            $table->string('claim_form_id');
            $table->string('claim_remark');
            $table->string('attached_file');
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
        Schema::dropIfExists('claim_supplier');
    }
}
