@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar Post</h1>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre:</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ old('title', $post->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">descripcion:</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" required>{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class=" mb-3 input-group">
                        <label class="input-group-text" for="main_image">Imagen Principal</label>
                        <input type="file" name="main_image" class="form-control" id="main_image">
                    </div>
                    <div class="mb-3">
                        <select name="user_id" id="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @selected(old('user_id', $post->user_id) == $user->id)>{{ $user->name }} -
                                    {{ $user->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
