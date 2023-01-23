@extends('layouts.admin')
@section('title')
    | TYPE-PROJECTS
@endsection

@section('content')
    <div class="container">
        <div class="mb-5 text-center">
            <h1 class="box-edit d-inline-block my-2 p-2 secondary-color">
                ELENCO DEI TIPI:
            </h1>
        </div>
        <table class="table table-dark table-striped mt-5 box-edit">
            <thead>
                <tr>
                    <th scope="col">
                        TIPO
                    </th>
                    <th scope="col">
                        PROGETTI
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>
                            {{ $type->name }}
                        </td>
                        <td>
                            <ol>
                                @foreach ($type->projects as $project)
                                    <li>
                                        <a href=" {{ route('admin.project.edit', $project) }} ">
                                            {{ $project->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
