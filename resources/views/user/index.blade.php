@extends('layouts.main')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-12">
                <h2>Lista de usuarios</h2>
                <div>
                    <a href="#" class="btn btn-primary">Agregar usuario</a>
                </div>
                <ul>
                    @foreach ($users as $user)
                        <li>{{ $user->name }} - {{ $user->email }} -
                            <form action="#" method="POST">
                                <a href="#" class="btn btn-warning">Editar</a>
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection
