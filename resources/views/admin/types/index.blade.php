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
                            <td>
                                <form action=" {{ route('admin.type.update', $type) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="border-0 bg-transparent text-white" type="text" name="name" value="{{ $type->name }}">
                                    <button type="submit" class="btn btn-warning me-3">UPDATE</button>
                                    @include('admin.partials.form-delete', [
                                    'title' => $type->name,
                                    'route' => 'admin.type.destroy',
                                    'element' => $type,
                                ])
                                </form>
                            </td>
                            <td class="text-center"> <a
                                    href="{{ route('admin.projects.projects-type') }}">{{ count($type->projects) }}</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center"> NESSUN RISULATO TROVATO </td>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
