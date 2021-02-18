<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function save(Request $request)
    {
        $data = array();
        
        for ($i=0; $i<$request->count; $i++) {
            array_push($data, 
                [
                    "id" => $request->req[$i]['id'], 
                    "employee_name" => $request->req[$i]['employee_name'], 
                    "employee_salary" => $request->req[$i]['employee_salary'], 
                    "employee_age" => $request->req[$i]['employee_age'], 
                    "profile_image" => ($request->req[$i]['profile_image'] == null) ? "" : $request->req[$i]['profile_image']
                ]);
        }

        $result = Employee::insert($data);
        
        return response()->json(["result" => $result]);
    }
}
