<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    protected $table = 'supplier_contact';

    protected $fillable = ['supplier_id', 'contact_name', 'contact_position', 'contact_hand_phone', 'contact_email','contact_website', 'created_by', 'modified_by'];

    public $timestamps = true;
}
