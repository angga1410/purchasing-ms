<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosdExtReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posd_ext_reference', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('posd_id');
            $table->string('reference_type');
            $table->string('reference_id');
            $table->string('status');
            $table->string('returned');
            $table->string('returned_date');
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
        Schema::dropIfExists('posd_ext_reference');
    }
}
