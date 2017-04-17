<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $primaryKey = 'dept_no';
	public $incrementing = false;

    public function employees()
    {
    	return $this->belongsToMany(Employee::class, 'dept_emp', 
    		'dept_no', 'emp_no');
    }
}
