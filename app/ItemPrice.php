<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    protected $table = 'item_price';

    protected $fillable = ['product_id', 'sequence_number', 'qty_item', 'unit_cost', 'sell_price', 'price_date', 'price_valid_until', 'status', 'created_by', 'modified_by'];

    public $timestamps = true;
}