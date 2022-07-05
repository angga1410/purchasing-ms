<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{   
    protected $connection = 'mysql2';
    protected $table = 'task';

    protected $fillable = ['name','task_desc' ,'start_date','assign_to','assign_by','task_desc','target_date','created_by', 'modified_by','user_id'];

    public $timestamps = true;

    /**
     * Get the contact for supplier.
     */
    
}
