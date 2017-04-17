<?php

namespace App;

use Illuminate\Database\Eloquent\Model;	

class Employee extends Model
{
	protected $primaryKey = 'emp_no';

    public function departments()
    {
    	return $this->belongsToMany(Department::class, 'dept_emp', 
    		'emp_no', 'dept_no');
    }

    public function salaries()
    {
    	return $this->hasMany(Salary::class, 'emp_no')->orderBy('from_date');
    }

    public function titles()
    {
    	return $this->hasMany(Title::class, 'emp_no')->orderBy('from_date');
    }


}
