<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';

    protected $fillable = ['mfr', 'category_part_num', 'part_num', 'part_name', 'part_desc', 'default_um', 'default_curr', 'unit_cost', 'sell_price', 'width',  'volume', 'weight','break_down_price', 'price_date', 'lead_time', 'price_valid_until', 'item_price', 'item_need_qc', 'status', 'created_by', 'modified_by'];

    public $timestamps = true;
}
