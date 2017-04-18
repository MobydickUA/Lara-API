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

        return $emp;
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
