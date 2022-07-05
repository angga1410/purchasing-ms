<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoSupplierDetail extends Model
{
    protected $table = 'po_supplier_detail';

    protected $fillable = ['pos_id','pr_detail_id','id','sequence_number', 'product_id', 'qty_pos','qty_delivered', 'um_pos', 'balance_qty', 'curr', 'unit_price','tax', 'have_external_reference', 'target_date_original', 'target_date_new', 'last_arrival_date', 'status', 'created_by', 'modified_by'];

    public $timestamps = true;

    public function item(){
        return $this
        ->hasOne('App\Items','id','product_id');
        
    }
    public function po(){
        return $this->hasOne('App\PurchaseOrder','id','pos_id');
    }
    public function pr(){
        return $this->hasOne('App\PurchaseRequest','id','pr_detail_id');
    }

   
}
