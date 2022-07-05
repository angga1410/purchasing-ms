<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendInvSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('send_inv_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pos_id');
            $table->string('supplier_id');
            $table->string('supplier_contact_id');
            $table->integer('send_form_id');
            $table->integer('send_form_remark');
            $table->integer('inoice_id');
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
        Schema::dropIfExists('send_inv_supplier');
    }
}
