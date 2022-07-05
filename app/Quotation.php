<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'quotation_supplier';

    protected $fillable = ['qs_num','qs_num_seq', 'qs_date', 'rfi_id', 'supplier_id', 'supplier_contact_id',
     'remark', 'status', 'termcondition','disc_type','disc_value',];

    public $timestamps = true;

    public function details()
    {
        return $this->hasMany('App\QuotationDetail', 'qs_id');
    }
    public function supplier()
    {
      return $this->hasOne("App\Supplier","id","supplier_id");
    }
    public function contact()
    {
      return $this->hasOne("App\SupplierContact","id","supplier_contact_id");
    }

    public function inq()
    {
      return $this->hasOne("App\Rfi","id","rfi_id");
    }
}
