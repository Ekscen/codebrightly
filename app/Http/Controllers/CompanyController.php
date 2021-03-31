<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Comment;

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
        $comments = $company->comments()->get();
        return view('company', ['company' => $company, 'employees' => $employees, 'comments' => $comments]);
    }

    public function saveDesc (Request $request, $id) {
        $company = Company::find($id);
        $company->description = $request->description;
        $company->save();
        return redirect()->back()->with('success', 'Описание сохранено');
    }

    public function savePhoto (Request $request, $id) {

        $path = $request->companyFoto->store("images/", "public");
        if ($path) {
            $pathArray = explode('/', $path);
            $fileName = end($pathArray);
            $company = Company::find($id);
            $company->photo = $fileName;
            $company->save();
            return redirect()->back()->with('success', 'Картинка обновлена');
        }
    }
    public function addComment (Request $request, $id) {
        $currentCompany = Session::get('company')['name'];
        $comment = new Comment([
            'comment'       =>  $request->comment,
            'company_id'    =>  $id,
            'creator_name'  =>  $currentCompany,
        ]);
        $comment->save();
        return redirect()->back()->with('success', 'Комментарий добавлен');
    }
    public function delete ($id) {
        Company::destroy($id);
        Session::forget('company');
        return redirect('/')->with('success', 'Компания удалена');
    }

    public function login (Request $request) {
        $company = Company::where( [ ['password', $request->password], ['login' , $request->login] ] )->first();
        if ($company) {
            Session::put('company', [
                'id'    => $company->id,
                'name'  => $company->name,
                ]
            );
            return redirect()->back()->with('success', 'Вы вошли');
        }
        return redirect()->back()->withErrors(['Данные авторизации не верны']);
    }

    public function logout () {
        Session::forget('company');
        return redirect()->back()->with('success', 'Вы вышли');
    }
}
