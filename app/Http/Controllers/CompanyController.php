<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Comment;
use App\Models\Position;

use Session;

class CompanyController extends Controller
{
    //
    public function home () {
        $collection = Employee::with(['company', 'position'])->get();
        $companies = [];
        $employees = [];
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
        $allPositions = Position::pluck('name', 'id');
        return view('company', ['company' => $company, 'employees' => $employees, 'comments' => $comments , 'allPositions' => $allPositions]);
    }

    public function saveDesc (Request $request, $id) {
        $request->validate([
            'description' => 'required',
        ]);
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
        $request->validate([
            'comment' => 'required',
        ]);
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

    public function addEmployee (Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);
        $employee = new Employee ([
            'name'          => $request->name,
            'position_id'   => $request->position_id,
            'company_id'    => $id,
        ]);
        $employee->save();
        return redirect()->back()->with('success', 'Сотрудник добавлен');
    }
    public function editEmployee (Request $request, $id, $emp_id) {
        $request->validate([
            'name' => 'required',
        ]);
        $employee = Company::find($id)->employees->where('id', $emp_id)->first();
        $employee->name = $request->name;
        $employee->position_id = $request->position_id;
        $employee->save();
        return redirect()->back()->with('success', 'Данные сотрудника изменены');
    }
    public function deleteEmployee ($id, $emp_id) {
        Company::find($id)->employees->where('id', $emp_id)->first()->delete();
        return redirect()->back()->with('success', 'Сотрудник удален');
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
