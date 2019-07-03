@extends('layouts.management')

@section('title')
    User - @foreach($users as $user) {{ $user->name }} @endforeach
@endsection

@section('content')

    <h3 class="m-3">
        User
        <small class="text-muted">@foreach($users as $user) {{ $user->name }} @endforeach</small>
    </h3>

    <div class="mx-3">
        @foreach($users as $user)
            <p>Email: {{ $user->email }}</p>
            <p>Verified At: {{ $user->email }}</p>
            <p>Created At: {{ $user->email }}</p>
            <p>Updated At: {{ $user->email }}</p>
        @endforeach

        <br><br>
        <a href="{{ action('Management\UserController@index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <br>

@endsection