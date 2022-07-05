<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfqDetail extends Model
{
    protected $table = 'rfq_detail';

    protected $fillable = ['rfq_id', 'rfi_detail_id', 'sequence_number', 'type_product_id', 'product_id', 'qty_rfq', 'um_rfq', 'rfq_detail_status', 'validation_needed'];

    public $timestamps = true;
}
