@extends('Layout/basic')

@section('content')
    @foreach ($companies as $id => $name)
        <a href='{{url("company/$id")}}' class="h1 text-dark">{{$name}}</a>
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
                @foreach($employees[$id] as $employee)
                    <tr>
                        <td class="text-center">{{$employee['name']}}</td>
                        <td class="text-center">{{$employee['position']}}</td>
                        <td class="text-center">{{$employee['salary']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection