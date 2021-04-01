@extends('Layout/basic')

@section('content')
    <h1 class="mb-3">{{$company->name}}@if(session()->get('company') && session()->get('company')['id'] === $company->id)<a href='{{url("company/{$company->id}/delete")}}' class="btn btn-danger mx-2">Удалить компанию</a>@endif</h1>
    <h2 class="mb-3">Логотип</h2>
    @if($company->photo)
        <img height="600" src='{{asset("storage/images/{$company->photo}")}}'>
    @else
        <img height="600" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Keen_Bild_Taxon.svg/1200px-Keen_Bild_Taxon.svg.png">
    @endif
    @if(session()->get('company') && session()->get('company')['id'] === $company->id)
        <form action='{{url("company/{$company->id}/savePhoto")}}' method="post" ENCTYPE="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="companyFoto">Загрузите фотографию</label>
                <input type="file" class="form-control-file" id="companyFoto" name="companyFoto">
                <input type="submit" class="btn btn-primary m-2">
            </div>
        </form>
    @endif
    <h2 class="mb-3">Описание</h2>
    @if(session()->get('company') && session()->get('company')['id'] === $company->id)
        <form action='{{url("company/{$company->id}/saveDesc")}}' method="post" class="w-100">
            @csrf
            <textarea class="w-100" name="description" id="description">{{$company->description}}</textarea>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Сохранить описание">
            </div>
        </form>
    @else
        <p>{{$company->description}}</p>
    @endif
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
                    @if(session()->get('company') && session()->get('company')['id'] === $company->id)
                        <form action="{{ url("company/{$company->id}/editEmployee/{$employee->id}") }}" method="post">
                            @csrf
                            <td class="text-left">
                                    <input class="btn btn-primary" type="submit" value="✓" title="Применить изменения">
                                    <input type="text" name="name" value='{{$employee->name}}'>
                            </td>
                            <td class="text-center">
                                <select class="form-select" name="position_id">
                                    @foreach($allPositions as $key => $name)
                                        <option value="{{$key}}" @if($key == $employee->position->id) selected @endif>{{$name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-right">
                                {{$employee->position->salary}}
                                <a href='{{url("company/{$company->id}/deleteEmployee/{$employee->id}")}}' title="Удалить сотрудника" class="btn btn-danger mx-2">X</a>
                            </td>
                        </form>
                    @else
                        <td class="text-center">
                            {{$employee->name}}
                        </td>
                        <td class="text-center">
                            {{$employee->position->name}}
                        </td>
                        <td class="text-center">
                            {{$employee->position->salary}}
                        </td>
                    @endif
                </tr>
            @endforeach
            @if(session()->get('company') && session()->get('company')['id'] === $company->id)
                <tr>
                    <form action='{{url("company/{$company->id}/addEmployee")}}' method="post">
                        @csrf
                        <td class="text-left">
                            <input type="text" name="name">
                        </td>
                        <td class="text-center">
                            <select class="form-select" name="position_id">
                                @foreach($allPositions as $key => $name)
                                    <option value="{{$key}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="text-right">
                            <input type="submit" class="btn btn-primary" value="Добавить сотрудника">
                        </td>
                    </form>
                </tr>
            @endif
        </tbody>
    </table>
    @if(session()->get('company'))
        <h2 class="mb-3">Комментарии</h2>
        <table class="table table-responsive-sm mt-1">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" name="name">
                        <span>
                            Компания
                        </span>
                    </th>
                    <th class="text-center" scope="col" name="position">
                        <span>
                            Комментарий
                        </span>
                    </th>
                    <th class="text-center" scope="col" name="salary">
                        <span>
                            Дата
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td class="text-center">{{$comment->creator_name}}</td>
                        <td class="text-center text-break">
                                {{$comment->comment}}
                        </td>
                        <td class="text-center">{{$comment->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action='{{url("company/{$company->id}/addComment")}}' method="post" class="w-100">
            @csrf
            <textarea class="w-100" name="comment" id="comment"></textarea>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Сохранить комментарий">
            </div>
        </form>
    @endif
@endsection