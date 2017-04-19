<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Employee;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Department $dep)
    {
        return $dep->load('departmentHeads');
    }

    public function employees(Department $dep, Request $request)
    {
        $offset = intval($request->input('offset'));
        $number = intval($request->input('number'));
        $dep->order = $request->input('order');
        
        $offset >= 0 ? $dep->offset = $offset : $dep->offset = 0;
        $number >100 ? $dep->number = 100 : $dep->number = $number;
        $number > 0  ? $dep->number = $number : $dep->number = 10;

        return $dep->getEmployees;
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
