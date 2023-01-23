@extends('layouts.admin')

@section('title')
    | PROJECTS
@endsection

@section('content')
    <div class="container secondary-color">
        <div class="text-center">
            <h1 class="box-edit d-inline-block my-2 p-2">
                TABELLA PROGETTI
            </h1>
            <div>
                <form action="{{route('admin.project.index')}}" method="GET">
                    @csrf
                    <input name="search" class="mf-btn-search box-edit" type="text" placeholder="CERCA PER NOME ...">
                    <button class="mf-btn-search box-edit" type="submit">VAI</button>
                </form>
            </div>
        </div>
        @include('admin.partials.messages-session')
        <table class="table table-dark table-striped mt-5 box-edit">
            <thead>
                <tr>
                    <th scope="col"><a href=" {{ route('admin.project.groupby', ['id', $direction]) }} ">ID <i
                                class="fa-solid fa-sort"></i></a></th>
                    <th scope="col"><a href="{{ route('admin.project.groupby', ['name', $direction]) }} ">NOME <i
                                class="fa-solid fa-sort"></i></a></th>
                    <th></th>
                    <th scope="col">CLIENT NAME</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row"> {{ $project->id }} </th>
                        <td> {{ $project->name }}</td>
                        <td><span class="badge text-bg-info text-uppercase">{{$project->type?->name}}</span></td>
                        <td> {{ $project->client_name }} </td>
                        <td>
                            <a class="btn btn-primary" href=" {{ route('admin.project.show', $project) }} ">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href=" {{ route('admin.project.edit', $project) }} ">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            @include('admin.partials.form-delete', [
                                'title' => $project->name,
                                'route' => 'admin.project.destroy',
                                'element' => $project,
                            ])
                        </td>
                    </tr>
                @empty
                    <td colspan="4" class="text-center"> NESSUN RISULATO TROVATO </td>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mf-pagination">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
