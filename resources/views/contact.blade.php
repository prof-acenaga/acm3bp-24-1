@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-test" >Contacto</h1>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <img src="{{ asset('assets/img/640x360.png') }}" alt="un texto">
        </div>
        <ul>
            @foreach ($posts as $post )
                <li>{{ $post->title }}
                    @if (auth()->check())
                        <a href="{{ route('product.add', $post->id) }}">Agregar</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>



@endsection
