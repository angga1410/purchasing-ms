<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('supplier_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->nullable();
            $table->smallInteger('address_type')->nullable();
            $table->mediumText('address_line_1')->nullable();
            $table->mediumText('address_line_2')->nullable();
            $table->mediumText('address_line_3')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('province_id')->nullable();
            $table->string('area_id')->nullable();
            $table->string('country_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
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
        Schema::dropIfExists('supplier_address');
    }
}
