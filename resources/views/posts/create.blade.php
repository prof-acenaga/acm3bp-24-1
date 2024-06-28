@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>crear post</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Nombre:</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">descripcion:</label>
                    <textarea name="content" id="content" cols="30" rows="10"
                    class="form-control"
                    required></textarea>
                </div>
                <div class="mb-3">
                    <select name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->id }}</option>
                        @endforeach
                    </select>
                </div>
                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection