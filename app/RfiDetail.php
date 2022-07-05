<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfiDetail extends Model
{
    protected $table = 'rfi_detail';

    protected $fillable = ['rfi_id', 'product_id', 'qty_pos'];

    public $timestamps = true;

    public function item(){
        return $this
        ->hasOne('App\Items','id','product_id');
        
    }
    public function po(){
        return $this->hasOne('App\PurchaseOrder','id','pos_id');
    }
}
