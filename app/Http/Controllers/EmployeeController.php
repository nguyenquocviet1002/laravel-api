<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index($id = null){
        if($id == null) {
            return Employee::orderBy('FirstName', 'asc')->get();
        } else {
            return Employee::find($id);
        }
    }

    public function create(Request $request){
        try{
            $employee = new Employee();
            $employee->LastName = $request->input('LastName');
            $employee->FirstName = $request->input('FirstName');
            $employee->Email = $request->input('Email');
            $employee->Phone = $request->input('Phone');

            $employee->save();
            return $employee;
        }catch(Throwable $err){
            return $err->getMessage();
        }
    }

    public function update($id, Request $request){
        try{
            $employee = Employee::find($id);
            if($employee){
                $employee->LastName = $request->input('LastName');
                $employee->FirstName = $request->input('FirstName');
                $employee->Email = $request->input('Email');
                $employee->Phone = $request->input('Phone');
    
                $employee->save();
                return $employee;
            }else{
                return 'Data not found';
            }
        }catch(Throwable $err){
            return $err->getMessage();
        }
    }

    public function delete($id){
        try{
            $employee = Employee::find($id);
            if($employee){
                $employee->delete();
                return $employee;
            }else{
                return 'Data not found';
            }
        }catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
