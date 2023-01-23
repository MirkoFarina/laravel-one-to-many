@extends('layouts.admin')
@section('title')
    | PROJECTS | EDIT
@endsection

@section('content')
    <div class="container secondary-color">
        <div class="mb-5 text-center">
            <h1 class="box-edit d-inline-block my-2 p-2">
                MODIFICA {{ $project->name }}
            </h1>
            <div>
                <a class="btn btn-primary" href=" {{ route('admin.project.show', $project) }} ">
                    <i class="fa-regular fa-eye"></i>
                </a>
                <a class="btn btn-info" href=" {{ route('admin.project.index') }} ">
                    TABELLA PROGETTI
                </a>
                @include('admin.partials.form-delete', [ 'title' => $project->name, 'route' => 'admin.project.destroy', 'element'=> $project])
            </div>
        </div>
        <form class="box-edit p-3" action=" {{ route('admin.project.update', $project) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label @error('name') text-danger @enderror">TITOLO *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name"
                    value=" {{ old('name', $project->name) }} " placeholder="titolo ..">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="type">TIPO:</label>
                <select  class="form-select" name="type_id">
                    <option value="">Seleziona il Tipo:</option>
                    @foreach ($types as $type)
                        <option @if($type->id == old('type_id', $project->type_id)) selected @endif value="{{$type->id}}"> {{$type->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="client_name" class="form-label @error('client_name') text-danger @enderror">CLIENT *</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name"
                    name="client_name" value=" {{ old('client_name', $project->client_name) }} " placeholder="client .. ">
                @error('client_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label @error('cover_image') text-danger @enderror">UPLOAD image *</label>
                <input onchange="showImg(event)" type="file" class="form-control mb-2 @error('cover_image') is-invalid @enderror" id="cover_image"
                    name="cover_image" placeholder="IMAGE ... ">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="show-img">
                    <img  id="image_thumb_up" src="" alt="">
                </div>
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Descrizione: </label>
                <textarea class="form-control" id="summary" name="summary" rows="3">{{ old('summary',$project->summary) }}
                </textarea>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit"> INVIA </button>
            </div>
        </form>
    </div>
    <script>
        function showImg(event) {
            const tagImage = document.getElementById('image_thumb_up');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
