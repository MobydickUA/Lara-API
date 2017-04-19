<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	
	protected $primaryKey = 'dept_no';
	public $incrementing = false;
	
	public $offset = 0;
	public $number = 10;
	public $order = '';
	private $orders = ['birth_date', 'first_name', 'last_name', 'hire_date'];

    public function employees()
    {
    	return $this->belongsToMany(Employee::class, 'dept_emp', 'dept_no', 'emp_no');
    }

    public function departmentHeads()
    {
    	return $this->belongsToMany(Employee::class, 'dept_manager', 'dept_no', 'emp_no')
    	->withPivot('from_date', 'to_date');
    	// ->withPivot('from_date', 'to_date')->orderBy('to_date', 'desc');

    }

    public function getEmployees()
    {
    	if(in_array($this->order, $this->orders))
    	return $this->belongsToMany(Employee::class, 'dept_emp', 
    		'dept_no', 'emp_no')->orderBy($this->order)->skip($this->offset)->take($this->number);

    	return $this->belongsToMany(Employee::class, 'dept_emp', 
    		'dept_no', 'emp_no')->orderBy('last_name')->orderBy('first_name')->skip($this->offset)->take($this->number);
    }
}