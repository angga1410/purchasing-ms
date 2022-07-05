<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'po_supplier';

    protected $fillable = ['po_number','disc_type','disc_type','po_number_seq','pr_id', 'rfq_id', 'supplier_id', 'supplier_contact_id', 'shipment_term', 'payment_term', 'import_via', 'cost_freight', 'cost_freight_amount', 'vat', 'qs_rating', 'remark', 'attached_file', 'status', 'invoice_status', 'pos_supplier_rating','po_date', 'approved', 'verified','verified_by','approved_by', 'approved_date', 'created_by', 'modified_by'];

    public $timestamps = true;

    public function details()
    {
        return $this->hasMany('App\PoSupplierDetail','pos_id');
    }
    public function item(){
        return $this->hasMany('App\Items','product_id');
    }

    public function dataall()
    {
        return $this->details()->union($this->item()->toBase());
    }
  public function supplier()
  {
    return $this->hasOne("App\Supplier","id","supplier_id");
  }

  public function contact()
  {
    return $this->hasOne("App\SupplierContact","id","supplier_contact_id");
  }

}
