<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $number = 10;
        $offset = intval($request->input('offset'));

        if(!is_int($offset))
            $offset = 0;
        return Employee::shortInfo($offset, $number)
            ->get(['emp_no', 'first_name', 'last_name', 'gender']);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Employee $emp)
    {
        return $emp->load('departments', 'drivenDepartment' ,'salaries', 'titles');
    }

    public function salaries(Employee $emp)
    {
        return $emp->salaries;
    }

    public function titles(Employee $emp)
    {
        return $emp->titles;
    }

    public function departments(Employee $emp)
    {
        return $emp->departments;
    }

    public function subordinates(Employee $emp)
    {
        return $emp->drivenDepartment;
    }

    public function search(Request $request)
    {
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        if($last_name)
        {
            if($first_name)
                return Employee::firstName($first_name)->lastName($last_name)->search();
            return Employee::lastName($last_name)->search();
        }
        if($first_name)
            return Employee::firstName($first_name)->search();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
