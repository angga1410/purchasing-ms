<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('complain_letter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id');
            $table->integer('complain_form_id');
            $table->string('complain_remark');
            $table->string('complain_by');
            $table->string('complain_date');
            $table->string('resolution_remark');
            $table->string('resolution_date');
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
        Schema::dropIfExists('complain_letter');
    }
}
