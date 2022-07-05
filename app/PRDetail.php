<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PRDetail extends Model
{
    protected $table = 'purchase_request_detail';

    protected $fillable = ['id','mfr','part_name','part_num','part_desc','curr','unit_cost','pr_id', 'product_id', 'qty_pr', 'um_pr', 'balance_qty', 'status','created_by','modified_by','created_at','updated_at'];

    public $timestamps = true;

    public function pr(){
        return $this->hasOne('App\PurchaseRequest','id','pr_id');
    }
    public function item(){
        return $this
        ->hasOne('App\Items','id','product_id');
        
    }
}
