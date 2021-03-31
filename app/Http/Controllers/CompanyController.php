<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Company;

use Session;

class CompanyController extends Controller
{
    //
    public function home () {
        $collection = Employee::with(['company', 'position'])->get();
        
        foreach ($collection as $employee) {
            $companies[$employee->company->id] = $employee->company->name;
            $employees[$employee->company->id][] = [
                'name'      => $employee->name,
                'position'  => $employee->position->name,
                'salary'    => $employee->position->salary,
            ];
        }

        return view('home', ['companies' => $companies , 'employees' => $employees]);
    }

    public function show ($id) {
        $company = Company::find($id);
        $employees = $company->employees()->with('position')->get();
        return view('company', ['company' => $company, 'employees' => $employees]);
    }

    public function saveDesc (Request $request, $id) {
        $company = Company::find($id);
        $company->description = $request->description;
        $company->save();
        return redirect()->back();
    }

    public function login (Request $request) {
        $company = Company::where( [ ['password', $request->password], ['login' , $request->login] ] )->first();
        if ($company) {
            Session::put('company', [
                'id'    => $company->id,
                'name'  => $company->name,
                ]
            );
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['Данные авторизации не верны']);
    }

    public function logout () {
        Session::forget('company');
        return redirect()->back();
    }
}
