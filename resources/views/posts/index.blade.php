@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Posts</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Agregar una publicacion</a>
            </div>
            <ul>
                @foreach ($posts as $post)
                    <li>{{ $post->title }} - {{ $post->user->name }}
                        @if ($post->main_image)
                            <img width="50" src="{{ asset('storage/'.$post->main_image) }}" alt="{{ $post->title }}">
                        @else
                            <img width="50" src="{{ asset('assets/img/No-Image-Placeholder.svg') }}" alt="sin imagen">
                        @endif
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </li>
                @endforeach
                <div class="py-5">
                    {{ $posts->links() }}
                </div>
            </ul>

        </div>
    </div>
</div>
@endsection
