@extends('layouts.main')

@section('content')

    <div class="container">
        <section class="row">
            <h2>Lista de usuarios</h2>
            <div class="col-6">
                @if ($users)
                    <ul>
                        @foreach ($users as $user)
                            <li> {{ $user->name }} - {{ $user->email }} </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    </div>






@endsection
