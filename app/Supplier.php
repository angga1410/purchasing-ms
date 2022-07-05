<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = ['supplier_name', 'supplier_type', 'approved', 'approved_by', 'approved_Date', 'created_by', 'modified_by', 'npwp'];

    public $timestamps = true;

    /**
     * Get the contact for supplier.
     */
    public function contacts()
    {
        return $this->hasMany('App\SupplierContact');
    }
}
