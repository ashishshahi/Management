<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companie;
use Lang;
use Auth;
class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      if(Auth::user()){
        $companies = companie::all();
        return view('complist',['companies'=>$companies]);
       }
        else{
            return redirect('login');
        }
    }
    public function show()
    {
      return view('companies');
    }
    public function create(Request $request)
    {
    $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
      $this->validate($request,[
        'name' => 'required|min:5|max:20',
        'email' => 'required|email|unique:users',
        'weburl' => 'regex:'. $regex,
        'logo' => 'required|max:1000|mimes:jpg,png,gif'
      ],
      [
            'name.required' => 'Name Must Be Filled By User',
			      'name.min' => 'Name At least 5 Character',
            'name.max' => 'Name Not Be Greater Than 20 character',
            'email.required' => 'Email Field Not be Empty',
            'weburl.regex' => 'Url Must Be proper',
            'logo.required' => 'Logo Must be Size minimum 100×100'
      ]);
      //Move Uploaded File
      $file = $request->file('logo');
      $destinationPath = base_path().'/public/uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      $companies = new Companie();
      $companies->name = request('name');
      $companies->email = request('email');
      $companies->website = request('weburl');
      $companies->logo_path = $file->getClientOriginalName();
      $companies->save();
      return redirect('/companies');
    }
    public function edit($id)
    {
      $companies = companie::where('id',$id)->first();
      return view('companies',['companies'=>$companies]);
    }
    public function update(Request $request,$id)
    {
      $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
      $this->validate($request,[
        'name' => 'required|min:5|max:20',
        'email' => 'required|email|unique:users',
        'weburl' => 'regex:'. $regex,
        'logo' => 'required|max:1000|mimes:jpg,png,gif'
      ],
      [
            'name.required' => 'Name Must Be Filled By User',
			      'name.min' => 'Name At least 5 Character',
            'name.max' => 'Name Not Be Greater Than 20 character',
            'email.required' => 'Email Field Not be Empty',
            'weburl.regex' => 'Url Must Be proper',
            'logo.required' => 'Logo Must be Size minimum 100×100'
      ]);
      //Move Uploaded File
      $file = $request->file('logo');
      $destinationPath = base_path().'/public/uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      $companies = Companie::find($id);
      $companies->name = request('name');
      $companies->email = request('email');
      $companies->website = request('weburl');
      $companies->logo_path = $file->getClientOriginalName();
      $companies->save();
      return redirect('/companies');
    }
    public function destroy($id)
    {
      $companies = Companie::find($id);
      if(isset($companies->name)){
        $companies->delete();
        return redirect('/companies')->with('message', Lang::get('customers.message.success_delete'));
      }else{
        return redirect('/companies')->with('error', Lang::get('customers.message.invalid'));
      }
    }
}
