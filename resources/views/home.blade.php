@extends('layouts.main')

@section('content')

<h1>Inicio</h1>

@if ($users)
    <ul>
        @foreach ($users as $user)
            <li> {{ $user->name }} - {{ $user->email }} </li>
        @endforeach
    </ul>
@endif


@endsection
