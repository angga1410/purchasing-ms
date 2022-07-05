<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('supplier_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->string('contact_name');
            $table->string('contact_position');
            $table->string('contact_hand_phone');
            $table->string('contact_email');
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
        Schema::dropIfExists('supplier_contact');
    }
}
