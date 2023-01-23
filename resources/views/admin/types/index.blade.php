@extends('layouts.admin')

@section('title')
    | TYPES
@endsection

@section('content')
    <div class="container secondary-color">
        <div class="text-center">
            <h1 class="box-edit d-inline-block my-2 p-2">
                TABELLA TIPI
            </h1>
        </div>
        @include('admin.partials.messages-session')
        <div class="d-flex flex-column justify-content-center align-items-center ">
            <div class="d-inline-block">
                <form action=" {{ route('admin.type.store') }} " method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="name" placeholder="INSERISCI NUOVO TIPO">
                        <button class="btn btn-primary" type="submit"> ADD </button>
                    </div>
                </form>
            </div>
            <table class="table table-dark table-striped mt-5 box-edit w-50">
                <thead>
                    <tr>
                        <th scope="col"> TIPO </th>
                        <th class="text-center" scope="col"> COUNT PER TIPO </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr>
                            <td> {{ $type->name }}</td>
                            <td class="text-center"> <a
                                    href="{{ route('admin.projects.projects-type') }}">{{ count($type->projects) }}</a> </td>
                            {{-- @include('admin.partials.form-delete', [
                                    'title' => $project->name,
                                    'route' => 'admin.project.destroy',
                                    'element' => $project,
                                ]) --}}
                        </tr>
                    @empty
                        <td colspan="4" class="text-center"> NESSUN RISULATO TROVATO </td>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
