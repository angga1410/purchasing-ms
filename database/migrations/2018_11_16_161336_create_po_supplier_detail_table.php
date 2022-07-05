<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoSupplierDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('po_supplier_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id');
            $table->integer('pr_detail_id');
            $table->string('sequence_number');
            $table->integer('product_id');
            $table->string('qty_pos');
            $table->string('um_pos');
            $table->string('balance_qty');
            $table->string('curr');
            $table->string('unit_price');
            $table->boolean('have_external_reference')->default(0);
            $table->string('target_date_original');
            $table->string('target_date_new');
            $table->string('last_arrival_date');
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
        Schema::dropIfExists('po_supplier_detail');
    }
}
