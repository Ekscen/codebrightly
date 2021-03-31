@extends('Layout/basic')

@section('content')
    <h1 class="mb-3">{{$company->name}}</h1>
    <h2 class="mb-3">Логотип</h2>
    <h2 class="mb-3">Описание</h2>
    <form class="w-100" action='{{url("company/{$company->id}/saveDesc")}}' method="post" class="col-12 col-sm-10 col-md-8 col-lg-4">
        @csrf
        <textarea class="w-100" name="description" id="description">{{$company->description}}</textarea>
        <div class="d-flex justify-content-center">
            <input class="btn btn-primary" type="submit" value="Сохранить описание">
        </div>
    </form>
    <h2>Сотрудники</h2>
    <table class="table table-responsive-sm mt-1">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col" name="name">
                    <span>
                        Сотрудник
                    </span>
                </th>
                <th class="text-center" scope="col" name="position">
                    <span>
                        Должность
                    </span>
                </th>
                <th class="text-center" scope="col" name="salary">
                    <span>
                        Зарплата
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td class="text-center">{{$employee->name}}</td>
                    <td class="text-center">{{$employee->position->name}}</td>
                    <td class="text-center">{{$employee->position->salary}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection