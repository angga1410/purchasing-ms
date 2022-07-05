<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrTerm extends Model
{
    protected $table = 'detail_pr_term';

    protected $fillable = ['sequence_number', 'type_product_id', 'qty_qs', 'um_qs','product_id','status','created_by'];

    public $timestamps = true;
}
