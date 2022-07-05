<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfi extends Model
{
    protected $table = 'request_for_inquiry';

    protected $fillable = ['id', 'rfi_num', 'rfi_num_seq', 'supplier_id','supplier_contact_id','rfi_requester_id','inq_date','remark', 'status', 'created_at', 'updated_at'];

    public $timestamps = true;

    /**
     * Get the contact for details.
     */
    public function details()
    {
        return $this->hasMany('App\RfiDetail', 'rfi_id');
    }
    public function supplier()
  {
    return $this->hasOne("App\Supplier","id","supplier_id");
  }
  public function contact()
  {
    return $this->hasOne("App\SupplierContact","id","supplier_contact_id");
  }

  public function item(){
      return $this->hasMany('App\Items','product_id');
  }

}
