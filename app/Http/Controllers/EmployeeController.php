<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employee.index', compact('employees'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::get(['id', 'name']);
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        //Store the Employee
        
        // Validate the incoming request
        $validator = \Validator::make($request->all(), $request->rules());  


        //if validator fail the error message will be returned
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Employee::create([
                
            'company_id' => $request->company,
            'firstname'  => $request->firstname,
            'lastname'   => $request->lastname,        
            'phone'      => $request->phone,
            'email'      => $request->email,
        ]);

        $notification = array(

            'message' => 'Employee Created Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get(['id', 'name']);
        return view('employee.edit',compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeFormRequest $request, Employee $employee)
    {
        $validator = \Validator::make($request->all(), $request->rules());  


        //if validator fail the error message will be returned
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        // Update Employee
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company;
        $employee->update();

        $notification = array(
            'message' => 'Employee updated successfully',
            'alert-type' => 'info'
        );
    
        return redirect()->route('employee.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        
        // Redirect back with success message
        $notification = array(
            
            'message' => 'Employee deleted successfully',
            'alert-type' => 'warning'
        );
    
        return redirect()->back()->with($notification);
    }
}
