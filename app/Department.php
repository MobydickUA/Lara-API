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

    public static function getEmployees($number = 10, $offset = 0)
    {
    	return function ($query) use ($number , $offset) {
    		$query->load('employees')->skip($offset)->take($number);
    	};
    }
}
