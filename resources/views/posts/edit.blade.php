@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar artículo</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" method="POST">
                            <div class="form-group mb-3">
                                <label class="form-label" for="title">Título *</label>
                                <input class="form-control" id="title" name="title" type="text"
                                       value="{{ old('title', $post->title) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="image">Imagen</label>
                                <input class="form-control" id="image" name="image" type="file">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="body">Contenido *</label>
                                <textarea class="form-control" rows="6" id="body" name="body"
                                          required>{{ old('body', $post->body) }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="iframe">Contenido embebido</label>
                                <textarea class="form-control" id="iframe"
                                          name="iframe">{{ old('iframe', $post->iframe) }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
