<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RRDetail extends Model
{
    protected $connection = 'mysql3';
    protected $table = 'receive_report_detail';

    protected $fillable = ['id','pr_detail_id','product_id','created_at'];
}
