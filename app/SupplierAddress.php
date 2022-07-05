<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierAddress extends Model
{
    protected $table = 'supplier_address';

    protected $fillable = ['supplier_id', 'address_type', 'address_line_1', 'address_line_2', 'address_line_3', 'city', 'post_code', 'province_id', 'area_id', 'country_id', 'phone', 'fax', 'email', 'website','created_by', 'modified_by'];

    public $timestamps = true;
}
