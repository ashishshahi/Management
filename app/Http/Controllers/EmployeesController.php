<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\companie;
use Auth;
use Lang;
class EmployeesController extends Controller
{
    public function index()
    {
        if(Auth::user()){
          $employees = Employee::all();
          return view('employeeslist',['employees'=>$employees]);
         }
          else{
              return redirect('login');
          }
    }
    public function show()
    {
      $company = companie::all();
       return view('/employees',['companies'=>$company]);
    }
    public function create(Request $request)
    {
      $this->validate($request,[
        'firstname' => 'required|min:5|max:10',
        'lastname' => 'required',
        'email' => 'required|email|unique:users',
        'companyname' => 'required',
        'phone' => 'required',
      ],
      [
            'firstname.required' => 'First Name Must Be Filled By User',
            'firstname.min' => 'First Name At least 5 Character',
            'firstname.max' => 'First Name Not Be Greater Than 10 character',
            'email.required' => 'Email Field Not be Empty',
            'companyname.required' => 'Company Name Must Be Choose By Employee',
            'phone.regex' => 'Number only 10 Numeric Character',
      ]);
      $employee = new Employee();
      $employee->firstname = request('firstname');
      $employee->lastname = request('lastname');
      $employee->companies_id = request('companyname');
      $employee->email = request('email');
      $employee->phone = request('phone');
      $employee->save();
      return redirect('/employees');
    }
    public function edit($id)
    {
        $employees = Employee::where('id',$id)->first();
        $company = companie::all();
        return view('employees',['employees'=>$employees,'companies'=>$company]);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'firstname' => 'required|min:5|max:10',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'companyname' => 'required',
            'phone' => 'required',
          ],
          [
                'firstname.required' => 'First Name Must Be Filled By User',
                'firstname.min' => 'First Name At least 5 Character',
                'firstname.max' => 'First Name Not Be Greater Than 10 character',
                'email.required' => 'Email Field Not be Empty',
                'companyname.required' => 'Company Name Must Be Choose By Employee',
                'phone.regex' => 'Number only 10 Numeric Character',
          ]);
          $employee =  Employee::find($id);
          $employee->firstname = request('firstname');
          $employee->lastname = request('lastname');
          $employee->companies_id = request('companyname');
          $employee->email = request('email');
          $employee->phone = request('phone');
          $employee->save();
          return redirect('/employees');
    }
    public function destroy($id)
    {
      $employee = Employee::find($id);
      if(isset($employee->firstname)){
        $employee->delete();
        return redirect('/employees')->with('message', Lang::get('employees.message.success_delete'));
      }else{
        return redirect('/employees')->with('error', Lang::get('employees.message.invalid'));
      }
    }
}
