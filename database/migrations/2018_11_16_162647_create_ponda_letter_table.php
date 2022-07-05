<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePondaLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ponda_letter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id');
            $table->integer('supplier_id');
            $table->integer('supplier_contact_id');
            $table->string('nda_form_id');
            $table->string('nda_form_remark');
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
        Schema::dropIfExists('ponda_letter');
    }
}
