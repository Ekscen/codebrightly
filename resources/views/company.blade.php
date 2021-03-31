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
                    <td class="text-center">{{$employee->name}}</td>
                    <td class="text-center">{{$employee->position->name}}</td>
                    <td class="text-center">{{$employee->position->salary}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if(session()->get('company'))
        <h2 class="mb-3">Комментарии</h2>
        <div class="d-flex justify-content-center flex-column ">
            @foreach($comments as $comment)
                <div class="p-3 m-1 bg-dark w-100 rounded" >
                    <div class="text-light d-flex m-1 justify-content-around">
                        <div>{{$comment->creator_name}}</div>
                        <div>{{$comment->created_at}}</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-light m-1">
                            {{$comment->comment}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <form action='{{url("company/{$company->id}/addComment")}}' method="post" class="w-100">
            @csrf
            <textarea class="w-100" name="comment" id="comment"></textarea>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Сохранить комментарий">
            </div>
        </form>
    @endif
@endsection