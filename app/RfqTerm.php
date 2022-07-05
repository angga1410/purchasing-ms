<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfqTerm extends Model
{
    protected $table = 'detail_rfq_term';

    protected $fillable = ['sequence_number', 'type_product_id', 'qty_rfi', 'um_rfi','product_id','status','created_by'];

    public $timestamps = true;
}
