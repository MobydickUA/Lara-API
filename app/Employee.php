<?php

namespace App;

use Illuminate\Database\Eloquent\Model;	

class Employee extends Model
{
	protected $primaryKey = 'emp_no';

    public function departments()
    {
    	return $this->belongsToMany(Department::class, 'dept_emp', 'emp_no', 'dept_no')
    	->withPivot('from_date', 'to_date');
    }

    public function salaries()
    {
    	return $this->hasMany(Salary::class, 'emp_no')->orderBy('from_date');
    }

    public function titles()
    {
    	return $this->hasMany(Title::class, 'emp_no')->orderBy('from_date');
    }

    public function drivenDepartment()
    {
    	return $this->belongsToMany(Department::class, 'dept_manager', 'emp_no', 'dept_no');
    }

    public function scopeSearch($query)
    {
    	return $query->orderBy('last_name')
                    ->orderBy('first_name')
                    ->take(100)
                    ->get();
    }

    public function scopeLastName($query, $last_name)
    {
    	return $query->where('last_name','LIKE' , "%$last_name%");
    }

    public function scopeFirstName($query, $first_name)
    {
    	return $query->where('first_name','LIKE' , "%$first_name%");
    }

    public static function scopeShortInfo($query, $offset, $number)
    {
        $query->orderBy('last_name')
            ->orderBy('first_name')
            ->skip($offset)
            ->take($number);
    }
}
