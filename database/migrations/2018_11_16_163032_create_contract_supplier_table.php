<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contract_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contract_num');
            $table->string('contract_start_date');
            $table->string('contract_end_date');
            $table->integer('supplier_id');
            $table->integer('supplier_contact_id');
            $table->integer('contact_form_id');
            $table->string('contact_remark');
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
        Schema::dropIfExists('contract_supplier');
    }
}
