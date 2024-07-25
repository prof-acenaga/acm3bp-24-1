@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-test" >Productos</h1>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif
        </div>
        <ul>
            @foreach ($products as $product )
                <li>{{ $product->name }}
                    @if (auth()->check())
                        <a href="{{ route('product.add', $product) }}">Agregar</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>



@endsection
