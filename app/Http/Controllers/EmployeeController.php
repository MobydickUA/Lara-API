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
        return Employee::orderBy('last_name')->orderBy('first_name')->skip($offset)->take($number)->get(['emp_no', 'first_name', 'last_name']);

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
        $emp->load('departments');
        $emp->load('salaries');
        $emp->load('titles');
        $emp->load('drivenDepartment');

        return $emp;
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
