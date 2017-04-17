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

        // $res = [];
        // $res['positions'] = [];

        // "emp_no": 35038,
        // "birth_date": "1962-09-06",
        // "first_name": "Dipayan",
        // "": "Peltason",
        // "gender": "M",
        // "hire_date": "1987-04-21",

        // $res['emp_no'] = $emp['emp_no'];
        // $res['birth_date'] = $emp['birth_date'];
        // $res['first_name'] = $emp['first_name'];
        // $res['last_name'] = $emp['last_name'];
        // $res['gender'] = $emp['gender'];
        // $res['hire_date'] = $emp['hire_date'];
        // $res['departments'] = $emp['departments'];
        // $res[''] = $emp[''];

        // foreach($emp['salaries'] as $sal)
        // {
        //     foreach($emp['titles'] as $title)
        //         if($sal['from_date'] >= $title['from_date'] && $sal['to_date'] <= $title['to_date'])
        //         {
        //             array_push($res['positions'], [$title['title'], $sal['from_date'], $sal['to_date'], $sal['salary']]);
        //         }

        // }


        // unset($emp['salaries']);
        // unset($emp['titles']);

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
