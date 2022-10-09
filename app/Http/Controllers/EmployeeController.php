<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){

        $employees= Employee::latest()->paginate(20);
        return view('employee.list',[
            'employees'=>$employees
        ]);


    }

    public function create(){
        //Create Employee
       
       return view('employee.create');
        
    }

    public function store(Request $request){


        $this->validate($request,[
             'emp_name' => 'required',
             'emp_email' => 'required',
             'emp_address'=>'required',
             'emp_phone'=>'required',
             
    ]);

         Employee::create([
         'emp_name'=>$request->emp_name,
         'emp_email'=>$request->emp_email,
         'emp_address'=>$request->emp_address,
         'emp_phone'=>$request->emp_phone,
        ]);

        
        
        
        return redirect()->route('employees.index');

}

public function edit($id){
    //Update Employee

    $employee = Employee::findOrFail($id);

  

    return view('employee.edit', ['employee' => $employee]);


}

public function update(Request $request, Employee $employee){

    

   $validator = $request->validate([
    'emp_name' => 'required',
    'emp_email' => 'required',
    'emp_address'=>'required',
    'emp_phone'=>'required',
    
   ]);

   Employee::findOrfail($employee)->update([
        'emp_name' =>$request->emp_name,
        'emp_email' =>$request->emp_email,
        'emp_address' =>$request->emp_address,
        'emp_phone' =>$request->emp_phone,
    ]);


  
   
   return redirect()->route('employees.index');

}
    

 public function destroy(Employee $employee){
    

    //Delete Employee

    $employee->delete();
    return back()->with('Success', 'Employee Deleted');

 }





}
