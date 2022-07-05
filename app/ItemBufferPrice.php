<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemBufferPrice extends Model
{
    protected $table = 'item_buffer_price';

    protected $fillable = ['product_buffer_id', 'sequence_number', 'qty_item', 'unit_cost', 'sell_price', 'price_date', 'price_valid_until', 'status', 'created_by', 'modified_by'];

    public $timestamps = true;
}