<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hscode extends Model
{
    protected $table = 'hscode';

    protected $fillable = ['hscode', 'hscode_desc', 'country', 'pod','currency' ,'value', 'status', 'created_by', 'modified_by'];

    public $timestamps = true;
}
