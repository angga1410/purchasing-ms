<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchase_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pr_dept');
            $table->string('pr_reference_type');
            $table->integer('pr_reference_id');
            $table->integer('pr_requester_id');
            $table->string('remark');
            $table->string('status');
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
        Schema::dropIfExists('purchase_request');
    }
}
