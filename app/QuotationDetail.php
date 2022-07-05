<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    protected $table = 'quotation_supplier_detail';

    protected $fillable = ['qs_id', 'product_id', 'qty_qs', 'curr', 'unit_price','lead_time','status','created_at',
    'updated_at'];

    public $timestamps = true;

    public function item(){
        return $this
        ->hasOne('App\Items','id','product_id');
        
    }
}
